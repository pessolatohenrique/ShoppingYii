<?php
namespace app\models;
use Yii;
use yii\db\Query;

/**
 * This is the model class for table "categorias".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $area_id
 */
class Categoria extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'categorias';
    }
    public function rules()
    {
        return [
            [['nome'], 'required', 'message' => 'O campo Nome é de preenchimento obrigatório'],
            [['area_id'],'required','message' => 'O campo Área é de preenchimento obrigatório'],
            [['nome'], 'string', 'max' => 50],
            [['nome'], 'unique'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'area_id' => 'Área do Shopping'
        ];
    }
    public function lista($params = array()){
        $query = new Query();
        //filtragem de pesquisa
        if(isset($params["area_id"]) && $params["area_id"] != ""){
            $query->where(["area_id" => $params["area_id"]]);
        }
        $categorias = $query->select(['c.*','a.nome AS area_nome'])
                            ->from('categorias c')
                            ->join('LEFT JOIN','areas a','c.area_id = a.id')
                            ->orderBy("c.nome")
                            ->all();
        return $categorias;
    }
    public function listaRelGastronomia(){
        $query = new Query();
        /*
SELECT c.*, COUNT(c.nome) AS total_categoria 
FROM `categorias` c RIGHT JOIN gastronomia g ON c.id = g.categoria_id
GROUP BY c.nome
ORDER BY c.nome
        */
        $categorias = $query->select(["c.*","COUNT(c.nome) AS total_categoria"])
                            ->from("categorias c")
                            ->join("RIGHT JOIN","gastronomia g","g.categoria_id = c.id")
                            ->groupBy("c.nome")
                            ->orderBy("c.nome")
                            ->all();
        return $categorias;
    }
}

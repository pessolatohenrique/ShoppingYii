<?php
namespace app\models;
use Yii;
use yii\db\Query;
/**
 * This is the model class for table "lojas".
 *
 * @property integer $id
 * @property integer $categoria_id
 * @property string $nome_loja
 * @property string $descricao
 * @property string $localizacao
 *
 * @property Categorias $categoria
 */
class Loja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lojas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria_id'], 'integer'],
            [['nome_loja'], 'required'],
            [['descricao', 'localizacao'], 'string'],
            [['nome_loja'], 'string', 'max' => 50],
            [['nome_loja'], 'unique'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Categoria',
            'nome_loja' => 'Loja',
            'descricao' => 'Descrição',
            'localizacao' => 'Localização',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::className(), ['id' => 'categoria_id']);
    }
    /**
     * @param $params: array de parâmetros, com os filtros de pesquisa a serem utilizados. Exemplos de filtros:
            *loja -> nome da loja (Saraiva, Renner, etc.)
            *categoria -> categoria (Livraria, Vestuário, etc.) pode assumir mais de um valor
            *descricao -> descrição da loja ("Variedade em livros","Roupas",etc)
     * @return lojas: lista de lojas, de acordo com a pesquisa
    */
    public function lista($params){
        $query = new Query();
        if(isset($params['loja']) && $params['loja'] != ""){
            $loja = $params['loja'];
            $query->andWhere(['like','nome_loja',$loja]);
        }
        if(isset($params['categoria']) && $params['categoria'][0] != ""){
            $categorias = $params['categoria'];
            $query->andWhere(['in','categoria_id',$categorias]);
        }
        if(isset($params['descricao']) && $params['descricao'] != ""){
            $descricao = $params['descricao'];
            $query->andWhere(['like','descricao',$descricao]);
        }
        $lojas = $query->select("l.*,c.nome AS categoria_nome")
                       ->from("lojas l")
                       ->innerJoin("categorias c","l.categoria_id = c.id")
                       ->orderBy("l.nome_loja")
                       ->all();
        return $lojas;
    }
}
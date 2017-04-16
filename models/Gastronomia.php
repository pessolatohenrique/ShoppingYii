<?php
namespace app\models;
use Yii;
use yii\db\Query;
/**
 * This is the model class for table "gastronomia".
 *
 * @property integer $id
 * @property integer $categoria_id
 * @property string $nome_loja
 * @property string $descricao
 * @property string $localizacao
 *
 * @property Cardapioitens[] $cardapioitens
 * @property CardapiotipoGastronomia[] $cardapiotipoGastronomias
 * @property Categorias $categoria
 */
class Gastronomia extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'gastronomia';
    }
    public function rules()
    {
        return [
            [['categoria_id'], 'integer'],
            [['nome_loja'], 'required','message' => 'O campo Nome é obrigatório'],
            [['localizacao'], 'required','message' => 'A localização da loja é obrigatória'],
            [['descricao', 'localizacao'], 'string'],
            [['nome_loja'], 'string', 'max' => 50],
            [['nome_loja'], 'unique'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Categoria',
            'nome_loja' => 'Nome',
            'descricao' => 'Descrição',
            'localizacao' => 'Localização',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardapioitens()
    {
        return $this->hasMany(Cardapioitens::className(), ['gastronomia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCardapiotipoGastronomias()
    {
        return $this->hasMany(CardapiotipoGastronomia::className(), ['gastronomia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }
    /*lista as lojas de gastronomia cadastradas*/
    public function lista($params_pesquisa){
        $query = new Query();
        if(isset($params_pesquisa['loja']) && $params_pesquisa['loja'] != ""){
            $loja = $params_pesquisa['loja'];
            $query->andWhere(['like', 'nome_loja', $loja]);
        }
        if(isset($params_pesquisa['categoria']) && $params_pesquisa['categoria'] != ""){
            $categoria = $params_pesquisa['categoria'];
            $query->andWhere(["categoria_id" => $categoria]);
        }
        if(isset($params_pesquisa['descricao']) && $params_pesquisa['descricao'] != ""){
            $descricao = $params_pesquisa['descricao'];
            $query->andWhere(['like','descricao',$descricao]);
        }
        $gastronomias = $query
        ->select("g.*,c.nome AS categoria_nome")
        ->from("gastronomia g")
        ->innerJoin('categorias c','g.categoria_id = c.id')
        ->orderBy("g.nome_loja")->all();
        return $gastronomias;
    }
    /*realiza a consulta de uma loja de gastronomia especifica*/
    public function consulta($gastronomia_id){
        $query = new Query();
        $gastronomia = $query
        ->select("g.*,c.nome AS categoria_nome,f.nome_arquivo, f.descricao AS descricao_foto")
        ->from("gastronomia g")
        ->innerJoin("categorias c","g.categoria_id = c.id")
        ->leftJoin("fotos f","f.loja_id = g.id")
        ->where(['g.id' => $gastronomia_id])
        ->one();
        return $gastronomia;
    }
    /*realiza a listagem de lojas gastronomicas semelhantes*/
    public function listaSemelhantes($gastronomiaObj,$qtdLimit){
        $nome_loja = $gastronomiaObj['nome_loja'];
        $categoria_id = $gastronomiaObj['categoria_id'];
        $query = new Query();
        $lojas = $query
        ->select("g.*,c.nome AS categoria_nome,f.nome_arquivo, f.descricao AS descricao_foto")
        ->from("gastronomia g")
        ->innerJoin("categorias c","g.categoria_id = c.id")
        ->leftJoin("fotos f","f.loja_id = g.id")
        ->where(['like','g.nome_loja',$nome_loja])
        ->orWhere(['categoria_id' => $categoria_id])
        ->andWhere(["<>",'g.id',$gastronomiaObj['id']])
        ->limit($qtdLimit)
        ->all();
        return $lojas;
    }
}

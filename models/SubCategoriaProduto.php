<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "subcategoriaprodutos".
 *
 * @property integer $id
 * @property integer $categoria_id
 * @property string $nome
 *
 * @property LojasSubcategoriaprodutos[] $lojasSubcategoriaprodutos
 * @property Categoriaprodutos $categoria
 */
class SubCategoriaProduto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subcategoriaprodutos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoria_id'], 'integer'],
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 150],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaprodutos::className(), 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria_id' => 'Categoria ID',
            'nome' => 'Nome',
        ];
    }   

    /**
        *lista as subcategorias vinculadas a loja e categoria de produto
        *@param $loja_id -> id da loja a ser consultada
        *@return $subcategorias -> subcategorias encontradas na pesquisa
    */
    public function lista($loja_id){
        $query = new Query();
        $subcategorias = $query->select("main.*,lo.nome_loja AS nome_loja, sub.nome AS subcategoria_nome, sub.categoria_id,cat.nome AS categoria_nome")
                                ->from("lojas_subcategoriaprodutos AS main")
                                ->join("INNER JOIN","lojas AS lo","main.loja_id = lo.id")
                                ->join("INNER JOIN","subcategoriaprodutos sub","main.subcategoria_id = sub.id")
                                ->join("INNER JOIN","categoriaprodutos cat","sub.categoria_id = cat.id")
                                ->where(["main.loja_id" => $loja_id])
                                ->orderBy("categoria_id ASC","subcategoria_nome ASC")
                                ->all();
        return $subcategorias;
    }
    /**
        *lista todas as subcategorias relacionadas a um produto
        *@param $categoria_id -> id da categoria a ser consultada
        *@return $subcategorias -> subcategorias encontradas na pesquisa 
    */
    public function listaRelCategoria($categoria_id){
        $query = new Query();
        $subcategorias = $query->select("sub.*")
                               ->from("subcategoriaprodutos sub")
                               ->where(["sub.categoria_id" => $categoria_id])
                               ->orderBy("sub.nome")
                               ->all();
        return $subcategorias;
    }
    /**
        *consulta uam subcategoria através de seu nome
        *@param categoria_id -> id da categoria 
        *@param nome -> nome da subcategoria
        *@return $subcategoria -> caso existir, retorna a subcategoria 
    */
    public function consultaPorNome($categoria_id,$nome){
        $query = new Query();
        $subcategoria = $query->select("sub.*")
                              ->from("subcategoriaprodutos sub")
                              ->where(["sub.categoria_id" => $categoria_id])
                              ->andWhere(['nome' => $nome])
                              ->one();
        return $subcategoria;

    }
}

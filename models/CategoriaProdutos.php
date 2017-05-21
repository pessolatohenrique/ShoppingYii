<?php

namespace app\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "categoriaprodutos".
 *
 * @property integer $id
 * @property string $nome
 */
class CategoriaProdutos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoriaprodutos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 150],
            [['nome'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
        ];
    }
    /**
        *lista as categorias de uma determinada loja
        *@param $loja_id: id da loja a ser pesquisada
        *@return $categorias: categorias encontradas na pesquisa
    */
    public function listaRelLoja($loja_id){
        $query = new Query();
        $categorias = $query->select("main.*, lo.nome_loja, cp.nome AS categoria_nome")
                            ->from("lojas_categoriaprodutos AS main")
                            ->join("INNER JOIN","lojas lo","main.loja_id = lo.id")
                            ->join("INNER JOIN","categoriaprodutos cp","main.categoria_id = cp.id")
                            ->where(['main.loja_id' => $loja_id])
                            ->orderBy("categoria_nome")
                            ->all();
        return $categorias;
    }
}

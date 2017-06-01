<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "lojas_subcategoriaprodutos".
 *
 * @property integer $id
 * @property integer $loja_id
 * @property integer $subcategoria_id
 *
 * @property Subcategoriaprodutos $subcategoria
 * @property Lojas $loja
 */
class LojasSubcategoriaProdutos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lojas_subcategoriaprodutos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loja_id', 'subcategoria_id'], 'integer'],
            [['subcategoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubCategoriaproduto::className(), 'targetAttribute' => ['subcategoria_id' => 'id']],
            [['loja_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::className(), 'targetAttribute' => ['loja_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'loja_id' => 'Loja ID',
            'subcategoria_id' => 'Subcategoria ID',
        ];
    }
    /**
        *verifica se existe vínculo entre loja e subcategoria
        *@param $loja_id: ID da loja
        *@param $subcategoria_id: ID da subcategoria consultada
        *@return $vinculo: true ou false
    */
    public function consultaVinculo($loja_id,$subcategoria_id){
        $query = new Query();
        $vinculo = $query->select("main.*")
                         ->from("lojas_subcategoriaprodutos main")
                         ->where(['loja_id' => $loja_id])
                         ->andWhere(["subcategoria_id" => $subcategoria_id])
                         ->one();
        return $vinculo;
    }
}

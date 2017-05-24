<?php

namespace app\models;

use Yii;

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
}

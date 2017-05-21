<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lojas_categoriaprodutos".
 *
 * @property integer $loja_id
 * @property integer $categoria_id
 *
 * @property Categoriaprodutos $categoria
 * @property Lojas $loja
 */
class LojaCategoriaProdutos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lojas_categoriaprodutos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loja_id', 'categoria_id'], 'integer'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriaprodutos::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['loja_id'], 'exist', 'skipOnError' => true, 'targetClass' => Loja::className(), 'targetAttribute' => ['loja_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'loja_id' => 'Loja ID',
            'categoria_id' => 'Categoria ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoriaprodutos::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoja()
    {
        return $this->hasOne(Loja::className(), ['id' => 'loja_id']);
    }
}

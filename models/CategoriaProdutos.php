<?php

namespace app\models;

use Yii;

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
}

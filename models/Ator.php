<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atores".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Atoresfilmes[] $atoresfilmes
 */
class Ator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 200],
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
     * @return \yii\db\ActiveQuery
     */
    public function getAtoresfilmes()
    {
        return $this->hasMany(AtorFilme::className(), ['ator_id' => 'id']);
    }
}

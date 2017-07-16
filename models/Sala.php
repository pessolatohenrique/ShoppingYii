<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salas".
 *
 * @property integer $id
 * @property string $nome
 * @property integer $capacidade
 *
 * @property Quadrohorarios[] $quadrohorarios
 */
class Sala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['capacidade'], 'integer'],
            [['nome'], 'string', 'max' => 20],
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
            'capacidade' => 'Capacidade',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuadrohorarios()
    {
        return $this->hasMany(QuadroHorario::className(), ['sala_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quadrohorarios".
 *
 * @property integer $id
 * @property integer $filme_id
 * @property integer $sala_id
 * @property string $data_exibicao
 * @property string $dia_semana
 * @property string $horario
 * @property integer $flag3D
 * @property integer $flagXD
 * @property string $idioma
 *
 * @property Filmes $filme
 * @property Salas $sala
 */
class QuadroHorario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quadrohorarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filme_id', 'sala_id', 'flag3D', 'flagXD'], 'integer'],
            [['data_exibicao', 'horario'], 'safe'],
            [['dia_semana', 'idioma'], 'string', 'max' => 3],
            [['filme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filme::className(), 'targetAttribute' => ['filme_id' => 'id']],
            [['sala_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sala::className(), 'targetAttribute' => ['sala_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filme_id' => 'Filme',
            'sala_id' => 'Sala',
            'data_exibicao' => 'Data Exibição',
            'dia_semana' => 'Dia Semana',
            'horario' => 'Horário',
            'flag3D' => '3D',
            'flagXD' => 'XD',
            'idioma' => 'Idioma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilme()
    {
        return $this->hasOne(Filme::className(), ['id' => 'filme_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSala()
    {
        return $this->hasOne(Sala::className(), ['id' => 'sala_id']);
    }
}

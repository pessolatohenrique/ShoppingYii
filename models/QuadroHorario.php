<?php

namespace app\models;

use Yii;
use yii\db\Query;

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

    /**
        *lista os últimos dias de semana cadastro no quadro de horários
        *exemplo: últimos 7 dias de programação
        *@param $numero_dias: número de dias a serem buscados. Para um semana, são 7, por exemplo
        *@return $dias_semana: retorna data (0000-00-00) e dia da semana (DOM,SEG,TER,etc)
    */
    public function listaAgenda($numero_dias){
        $dias_semana = $this->find()->select(['data_exibicao', 'dia_semana'])
                        ->distinct()->limit($numero_dias)
                        ->orderBy('data_exibicao DESC')
                        ->all();
        return $dias_semana;
    }
    /**
        *lista os filmes da agenda, referente ao quadro de horários
        *exemplo: filmes dos próximos 7 dias
        *@param: $fields: campos a serem pesquisados
        *@param $numero_dias: número de dias a serem buscados. Para uma semana, por exemplo, é 7
        *@return $filmes: agenda de filmes encontrada
    */
    public function listaFilmes($fields,$numero_dias){
        $filmes = $this->find()
                       ->select($fields)
                       ->distinct()
                       ->where(["<=",'DATEDIFF(data_exibicao,NOW())',$numero_dias])
                       ->orderBy('filme_id DESC')
                       ->all();
        return $filmes;
    }
    /**
        *lista as salas referente a um determinado filme
        *exemplo: "Homem-Aranha" está sendo exibido nas salas 01 e 05
        *@param: $fields: campos a serem pesquisados
        *@param $filme_id: id do filme a ser pesquisado
        *@return $salas: salas correspondentes ao filme
    */
    public function listaSalas($fields,$filme_id){
        $query = new Query();
        $salas = $query
                 ->select($fields)
                 ->distinct()
                 ->from("quadrohorarios quad")
                 ->leftJoin("salas sal","quad.sala_id = sal.id")
                 ->where(['filme_id' => $filme_id])
                 ->orderBy('data_exibicao DESC')
                 ->all();
        return $salas;
    }
    /**
        *lista os horários de um determinado filme e sala
        *exemplo: "Homem-Aranha" será exibido na sala 02, nos horários - 10:00,14:00 e 19:30
        *@param $fields: campos a serem pesquisados
        *@param $filme_id: id do filme a ser pesquisado
        *@param $sala_id: id da sala a ser pesquisada
        *@return $horarios: horários encontrados
    */
    public function listaHorarios($fields,$filme_id,$sala_id){
        $query = new Query();
        $horarios = $query
                    ->select($fields)
                    ->from("quadrohorarios quad")
                    ->where(['filme_id' => $filme_id])
                    ->andWhere(['sala_id' => $sala_id])
                    ->orderBy('data_exibicao DESC')
                    ->all();
        return $horarios;
    }
}

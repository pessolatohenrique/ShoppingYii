<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "atoresfilmes".
 *
 * @property integer $ator_id
 * @property integer $filme_id
 * @property string $personagem
 *
 * @property Atores $ator
 * @property Filmes $filme
 */
class AtorFilme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atoresfilmes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ator_id', 'filme_id'], 'integer'],
            [['personagem'], 'string', 'max' => 200],
            [['ator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ator::className(), 'targetAttribute' => ['ator_id' => 'id']],
            [['filme_id'], 'exist', 'skipOnError' => true, 'targetClass' => Filme::className(), 'targetAttribute' => ['filme_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ator_id' => 'Ator ID',
            'filme_id' => 'Filme ID',
            'personagem' => 'Personagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtor()
    {
        return $this->hasOne(Ator::className(), ['id' => 'ator_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilme()
    {
        return $this->hasOne(Filme::className(), ['id' => 'filme_id']);
    }

    /**
    *monta a string de atores.
    *@param $filme_id: ID do filme a ser pesquisado
    *@return $atores: atores com seus personagens, separados por vírgula
        Exemplo: Gal Gadot (Mulher Maravilha), Cris Pine (Capitão Steve)
    */
    public function listaAtores($filme_id){
        $relAtores = $this->find()->where(['filme_id' => $filme_id])->all();
        $atores = "";
        if(count($relAtores) > 0){
            foreach($relAtores as $key => $val){
                $atores = $atores.$val->ator->nome." (".$val->personagem."), ";
            }
            //remove a última vírgula
            $atores = trim($atores);
            $atores = substr($atores,0,-1);
        }else{
            $atores = "Nenhum ator vinculado a este filme";
        }
        return $atores;
    }
}

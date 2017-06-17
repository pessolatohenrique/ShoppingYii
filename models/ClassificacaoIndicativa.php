<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "classificacoes_indicativas".
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property Filmes[] $filmes
 */
class ClassificacaoIndicativa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'classificacoes_indicativas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 15],
            [['descricao'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmes()
    {
        return $this->hasMany(Filmes::className(), ['classificacao_id' => 'id']);
    }
    /**
        *lista as classificações indicativas que possuem relacionamento com filmes
        *@return $classificacoes: lista encontrada na busca
    */
    public function listaRelFilmes(){
        $query = new Query();
        $classificacoes = $query
        ->select("cla.id,cla.descricao")
        ->distinct()
        ->from("classificacoes_indicativas cla")
        ->rightJoin("filmes fil","cla.id = fil.classificacao_id")
        ->orderBy("cla.id")
        ->all();
        return $classificacoes;
    }
}

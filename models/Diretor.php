<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "diretores".
 *
 * @property integer $id
 * @property string $nome
 *
 * @property Filmes[] $filmes
 */
class Diretor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diretores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome'], 'required'],
            [['nome'], 'string', 'max' => 200],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmes()
    {
        return $this->hasMany(Filmes::className(), ['diretor_id' => 'id']);
    }
    /**
        *lista os diretores que possuem filmes relacionados
        *@return $diretores: diretores encontrados na pesquisa
    */
    public function listaRelFilmes(){
        $query = new Query();
        $diretores = $query
        ->select("dir.id,dir.nome")
        ->distinct()
        ->from("diretores dir")
        ->rightJoin("filmes fil","dir.id = fil.diretor_id")
        ->orderBy("dir.nome")
        ->all();
        return $diretores;
    }
}

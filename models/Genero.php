<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "generos".
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property Filmes[] $filmes
 */
class Genero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'generos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 20],
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
        return $this->hasMany(Filme::className(), ['genero_id' => 'id']);
    }
    /**
        *lista os gêneros que estão presentes (relacionados) na tabela de filmes
        *@return $generos: gêneros encontrados na pesquisa
    */
    public function listaRelFilmes(){
        $query = new Query();
        $generos = $query
        ->select("gen.id,gen.descricao")
        ->distinct()
        ->from("generos gen")
        ->rightJoin("filmes fil","gen.id = fil.genero_id")
        ->orderBy("descricao")
        ->all();
        return $generos;
    }
}

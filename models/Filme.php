<?php

namespace app\models;

use Yii;
use yii\db\Query;
/**
 * This is the model class for table "filmes".
 *
 * @property integer $id
 * @property integer $status_id
 * @property integer $genero_id
 * @property integer $distribuidora_id
 * @property integer $diretor_id
 * @property integer $classificacao_id
 * @property string $titulo
 * @property string $duracao
 * @property string $sinopse
 * @property string $trailer
 * @property string $arquivo
 *
 * @property ClassificacoesIndicativas $classificacao
 * @property Diretores $diretor
 * @property Distribuidoras $distribuidora
 * @property Generos $genero
 * @property StatusExibicao $status
 */
class Filme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'filmes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_id', 'genero_id', 'distribuidora_id', 'diretor_id', 'classificacao_id'], 'integer'],
            [['titulo'], 'required'],
            [['titulo'], 'string', 'max' => 200],
            [['duracao'], 'string', 'max' => 3],
            [['sinopse', 'trailer', 'arquivo'], 'string', 'max' => 255],
            [['titulo'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_id' => 'Status ID',
            'genero_id' => 'Genero ID',
            'distribuidora_id' => 'Distribuidora ID',
            'diretor_id' => 'Diretor ID',
            'classificacao_id' => 'Classificacao ID',
            'titulo' => 'Titulo',
            'duracao' => 'Duracao',
            'sinopse' => 'Sinopse',
            'trailer' => 'Trailer',
            'arquivo' => 'Arquivo',
        ];
    }
    /**
        *lista os filmes cadastrados, de acordo com pesquisa realizada
        *@param $fields: campos a serem selecionados
            *o objetivo deste campo é dinamizar as querys, não sobrecarregando as consultas
        *@param $filtros: possíveis campos a serem combinados e pesquisados
        *@return $filmes: filmes encontrados na busca 
    */
    public function lista($fields,$filtros = array()){
        $query = new Query();
        $filmes = $query
        ->select($fields)
        ->from("filmes fi")
        ->leftJoin("classificacoes_indicativas clas","fi.classificacao_id = clas.id")
        ->leftJoin("generos gen","fi.genero_id = gen.id")
        ->leftJoin("status_exibicao stu","fi.status_id = stu.id")
        ->leftJoin("distribuidoras est","fi.distribuidora_id = est.id")
        ->leftJoin("diretores dir","fi.diretor_id = dir.id")
        ->where(["fi.status_id" => 1])
        ->orderBy("fi.titulo")
        ->all();
        return $filmes;
    }
}

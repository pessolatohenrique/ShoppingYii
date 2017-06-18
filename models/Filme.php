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
            [['sinopse', 'trailer', 'arquivo'], 'string'],
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
            'status_id' => 'Status',
            'genero_id' => 'Gênero',
            'distribuidora_id' => 'Estúdio',
            'diretor_id' => 'Diretor',
            'classificacao_id' => 'Classificação Indicativa',
            'titulo' => 'Título',
            'duracao' => 'Duração',
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
        /*filtragem de campos*/
        if(!isset($filtros['status']) || $filtros['status'] == 1){
            $query->andWhere(['fi.status_id' => 1]);
        }
        if(isset($filtros['titulo']) && $filtros['titulo'] != ""){
            $titulo = $filtros['titulo'];
            $query->andWhere(['like','fi.titulo',$titulo]);
        }        
        if(isset($filtros['genero']) && count($filtros['genero']) > 0){
            $generos = $filtros['genero'];
            $query->andWhere(['in','fi.genero_id',$generos]);
        }
        if(isset($filtros['estudio']) && count($filtros['estudio']) > 0){
            $estudios = $filtros['estudio'];
            $query->andWhere(['in','fi.distribuidora_id',$estudios]);
        }
        if(isset($filtros['diretor']) && count($filtros['diretor']) > 0){
            $diretores = $filtros['diretor'];
            $query->andWhere(['in','fi.diretor_id',$diretores]);
        }
        if(isset($filtros['status']) && count($filtros['status']) > 0){
            $status = $filtros['status'];
            $query->andWhere(['fi.status_id' => $status]);
        }
        if(isset($filtros['classificacao']) && count($filtros['classificacao']) > 0){
            $classificacoes = $filtros['classificacao'];
            $query->andWhere(['fi.classificacao_id' => $classificacoes]);
        }
        if(isset($filtros['duracao']) && count($filtros['duracao']) > 0){
            $duracao = $filtros['duracao'];
            $query->andWhere(['>=','fi.duracao',$duracao]);
        }
        /*fim da filtragem de campos*/
        $filmes = $query
        ->select($fields)
        ->from("filmes fi")
        ->leftJoin("classificacoes_indicativas clas","fi.classificacao_id = clas.id")
        ->leftJoin("generos gen","fi.genero_id = gen.id")
        ->leftJoin("status_exibicao stu","fi.status_id = stu.id")
        ->leftJoin("distribuidoras est","fi.distribuidora_id = est.id")
        ->leftJoin("diretores dir","fi.diretor_id = dir.id")
        // ->where(["fi.status_id" => 1])
        ->orderBy("fi.titulo")
        ->all();
        return $filmes;
    }
    /**
        *realiza a consulta de um filme, com base nos campos e id
        *@param $fields: campos a serem buscados
        *@param $filme_id: id do filme a ser buscado
        *@return $filme: filme consultado 
    */
    public function consulta($fields,$id){
        $query = new Query();
        $filme = $query
        ->select($fields)
        ->from("filmes fi")
        ->leftJoin("classificacoes_indicativas clas","fi.classificacao_id = clas.id")
        ->leftJoin("generos gen","fi.genero_id = gen.id")
        ->leftJoin("status_exibicao stu","fi.status_id = stu.id")
        ->leftJoin("distribuidoras est","fi.distribuidora_id = est.id")
        ->leftJoin("diretores dir","fi.diretor_id = dir.id")
        ->where(['fi.id' => $id])
        ->one();
        return $filme;
    }
    /**
        *transforma a classificação para mostrar em tela
        *Em caso de "Livre", deixar o texto;
        *Caso contrário, imprimir apenas a idade
        *@param $strClassificacao: String da Classificação
        *@return $nova_classificacao: Classificação transformada
    */
    public function verificaClassificacao($strClassificacao){
        $strClassificacao = strtolower($strClassificacao);
        switch($strClassificacao){
            case 'livre': $nova_classificacao = "Livre"; break;
            default: $nova_classificacao = substr($strClassificacao, 0,2);break;
        }
        return $nova_classificacao;
    }
    /**
        *verifica a classe CSS para a classificação
        *o objetivo é adaptar a cor corretamente, de acordo com a classificação fornecida
        *@param $strClassificacao: String da Classificacao
        *@return $classe: Classe CSS correspondente à classificação
    */
    public function verificaClasseClassificacao($strClassificacao){
        $classe = "classificacao-livre";
        switch($strClassificacao){
            case '10': $classe = "classificacao-10";break;
            case '12': $classe = "classificacao-12";break;
            case '14': $classe = "classificacao-14";break;
            case '16': $classe = "classificacao-16";break;
            case '18': $classe = "classificacao-18";break;
        }
        return $classe;
    }
    /**
        *verifica a classe CSS para o status
        *o objetivo é adaptar a cor correspondente, de acordo com o status fornecido
        *@param $status_id: ID do status
        *@return $classe: Classe CSS correspondente ao status
    */
    public function verificaClasseStatus($status_id){
        $classe = "status-exibicao";
        switch($status_id){
            case 2: $classe = "status-em-breve";break;
            case 3: $classe = "status-desativado";break;
        }
        return $classe;
    }
    /**
        *obtem o link do vídeo para ser incorporado a página
        *o objetivo é obdecer corretamente a ferramenta de incorporação do youtube
        *Anterior: https://www.youtube.com/watch?v=H8d1pD49JOk
        *Novo, para incorporar: https://www.youtube.com/embed/H8d1pD49JOk
        *@param $link: Link no formato comum
        *@return $link_format: link no formato de incorporação
    */
    public function getLinkTrailer($link){
        $link_format = "";
        $link_explode = explode("?",$link);
        $link_explode[1] = str_replace("v=", "", $link_explode[1]);
        $link_format = "https://www.youtube.com/embed/".$link_explode[1];
        return $link_format;
    }
}

<?php
namespace app\controllers;
use yii\web\Controller;
use app\models\QuadroHorario;
use app\models\Filme;
use app\models\AtorFilme;
class Site_cinemaController extends Controller
{
	public $layout = "usuarioFinal.php";
    public function actionIndex()
    {
        $quadroObj = new QuadroHorario();
        $dias_semana = $quadroObj->listaAgenda(7);
        $tamanho = count($dias_semana);
        $tamanho--;
        $fields = ['filme_id'];
        $filmes_semana = $quadroObj->listaFilmes($fields,7);
        $array_filmes = array();
        foreach($filmes_semana as $key => $val){
            $fields_salas = ['quad.sala_id','sal.nome AS sala_nome'];
            $fields_horarios = ['quad.data_exibicao','quad.dia_semana','quad.horario','quad.sala_id','quad.flag3D','quad.flagXD','quad.idioma'];
            $salas_filme = $quadroObj->listaSalas($fields_salas,$val->filme_id);
            foreach($salas_filme as $key_sala => $val_sala){
                $horarios_filme = $quadroObj->listaHorarios($fields_horarios,$val->filme_id,$val_sala['sala_id']);
                array_push($salas_filme[$key_sala], $horarios_filme);
            }
            $array_temp = array(
                'filme_id' => $val->filme_id,
                'titulo' => $val->filme->titulo,
                'sinopse' => $val->filme->sinopse,
                'salas' => $salas_filme
            );
            array_push($array_filmes, $array_temp);
        }
        return $this->render('index', [
            'dias_semana' => $dias_semana,
            'primeira_data' => $dias_semana[$tamanho],
            'filmes' => $array_filmes
        ]);
    }
    public function actionSearch($filme_id){
        $fields = "clas.descricao AS classificacao,gen.descricao AS genero_nome,stu.descricao AS status_exibicao,est.nome AS estudio_nome, dir.nome AS diretor_nome,fi.id,fi.status_id,fi.genero_id,fi.distribuidora_id,fi.diretor_id,fi.classificacao_id,fi.titulo,fi.duracao, fi.sinopse,fi.arquivo,fi.trailer";
        $filmeObj = new Filme();
        $atorFilmeObj = new AtorFilme();
        $filme_consulta = $filmeObj->consulta($fields,$filme_id);
        $classificacao = $filmeObj->verificaClassificacao($filme_consulta['classificacao']);
        $classe_classificacao = $filmeObj->verificaClasseClassificacao($classificacao);
        $classe_status = $filmeObj->verificaClasseStatus($filme_consulta['status_id']);
        $video_trailer = $filmeObj->getLinkTrailer($filme_consulta['trailer']);
        $atores = $atorFilmeObj->listaAtores($filme_id,1);
        $atores_tabela = $atorFilmeObj->listaAtores($filme_id,0);
        // var_dump($atores); die;
        return $this->render('search', [
            'filme_consulta' => $filmeObj->consulta($fields,$filme_id),
            'classificacao' => $classificacao,
            'classe_classificacao' => $classe_classificacao,
            'classe_status' => $classe_status,
            'video_trailer' => $video_trailer,
            'atores' => $atores,
            'atores_tabela' => $atores_tabela
        ]);
    }
}

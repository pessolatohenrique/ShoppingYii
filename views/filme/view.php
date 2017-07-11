<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Filme */

$this->title = "Shopping | ".$filme_consulta['titulo'];
$this->params['breadcrumbs'][] = ['label' => 'Filmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $filme_consulta['titulo'];
?>
<div class="filme-view">
    <section class="informacoes-filme">
        <div class="row">
            <div class="col-md-2 colunaPoster">
                <figure>
                    <img src="<?=Url::base()?>/arquivos/<?=$filme_consulta['arquivo']?>" alt="Pôster do filme <?=$filme_consulta['titulo']?>">
                    <figcaption>Pôster do Filme</figcaption>
                </figure>
            </div>
            <div class="col-md-10 colunaInfoFilme">
                <h1><?=$filme_consulta['titulo']?></h1>
                <ul class="etiquetas-filme">
                    <li class="<?=$classe_status?>"><?=$filme_consulta['status_exibicao']?></li>
                    <li class="<?=$classe_classificacao?>"><?=$classificacao?></li>
                    <li><?=$filme_consulta['genero_nome']?></li>
                    <li><?=$filme_consulta['duracao']?> minutos</li>
                </ul>
                <p>
                    <strong>Diretor: </strong><?=$filme_consulta['diretor_nome']?><br>
                    <strong>Estúdio: </strong><?=$filme_consulta['estudio_nome']?><br>
                    <strong>Elenco: </strong><?=$atores?>
                    <br>
                    <strong>Sinopse: </strong><br>
                    <?=$filme_consulta['sinopse']?>
                </p>
            </div>
        </div>
    </section>
    <section class="trailer-filme">
        <fieldset>
            <legend>Trailer</legend>
            <p>Confira abaixo o trailer do filme</p>     
            <iframe width="700" height="415" src="<?=$video_trailer?>" frameborder="0" allowfullscreen></iframe>
        </fieldset>
    </section>
</div>

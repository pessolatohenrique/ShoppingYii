<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Filme */

$this->title = 'Atualizar Filme: ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Filmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->titulo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="filme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_foto' => $model_foto,
        'generos' => $generos,
        'estudios' => $estudios,
        'diretores' => $diretores,
        'status' => $status,
        'classificacoes' => $classificacoes
    ]) ?>

</div>

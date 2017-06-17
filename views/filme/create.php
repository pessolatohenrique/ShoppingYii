<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Filme */

$this->title = 'Shopping | Novo Filme';
$this->params['breadcrumbs'][] = ['label' => 'Filmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Novo Filme";
?>
<div class="filme-create">

    <h1>Adicionar Novo Filme</h1>

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

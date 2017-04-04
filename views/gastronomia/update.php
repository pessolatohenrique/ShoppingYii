<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */

$this->title = 'Shopping | Atualizar ' . $model->nome_loja;
$this->params['breadcrumbs'][] = ['label' => 'Gastronomias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_loja, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="gastronomia-update">

    <h1>Atualizar: <?=$model->nome_loja?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_foto' => $model_foto,
        'categorias' => $categorias,
        'categoria_id' => $model->categoria_id,
        'pesquisa' => $pesquisa
    ]) ?>

</div>

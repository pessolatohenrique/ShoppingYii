<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */

$this->title = 'Shopping | Nova Gastronomia';
$this->params['breadcrumbs'][] = ['label' => 'Gastronomias', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Nova Loja de Gastronomia";
?>
<div class="gastronomia-create">

    <h1>Nova Loja de Gastronomia</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_foto' => $model_foto,
        'categorias' => $categorias
    ]) ?>

</div>

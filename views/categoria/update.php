<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Shopping | Atualizar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="categoria-update">

    <h1>Atualizar Categoria: <?= $model->nome?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'areas' => $areas
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = 'Shopping | Criar Categoria';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-create">

    <h1>Criar Categoria</h1>
    <?= $this->render('_form', [
        'model' => $model,
        'areas' => $areas

    ]) ?>

</div>

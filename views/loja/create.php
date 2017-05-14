<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Lojas */

$this->title = 'Shopping | Nova Loja';
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Nova Loja";
?>
<div class="lojas-create">

    <h1>Adicionar Nova Loja</h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_foto' => $model_foto,
        'categorias' => $categorias
    ]) ?>

</div>

<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Lojas */

$this->title = 'Shopping | ' . $model->nome_loja;
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome_loja];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="lojas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'model_foto' => $model_foto,
        'categorias' => $categorias,
        'categoria_id' => $model->categoria_id,
        'pesquisa' => $pesquisa
    ]) ?>

</div>

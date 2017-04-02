<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */

$this->title = 'Create Gastronomia';
$this->params['breadcrumbs'][] = ['label' => 'Gastronomias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastronomia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quadro Horarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quadro-horario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Quadro Horario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'filme_id',
            'sala_id',
            'data_exibicao',
            'dia_semana',
            // 'horario',
            // 'flag3D',
            // 'flagXD',
            // 'idioma',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

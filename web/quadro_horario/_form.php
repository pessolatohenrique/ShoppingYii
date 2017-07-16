<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuadroHorario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quadro-horario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filme_id')->textInput() ?>

    <?= $form->field($model, 'sala_id')->textInput() ?>

    <?= $form->field($model, 'data_exibicao')->textInput() ?>

    <?= $form->field($model, 'dia_semana')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario')->textInput() ?>

    <?= $form->field($model, 'flag3D')->textInput() ?>

    <?= $form->field($model, 'flagXD')->textInput() ?>

    <?= $form->field($model, 'idioma')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

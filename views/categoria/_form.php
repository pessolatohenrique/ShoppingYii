<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">
	<?php $form = ActiveForm::begin(); ?>
    <div class="row">
    	<div class="col-md-8">
    		<?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    	</div>
    	<div class="col-md-4">
    		<label for="area_id">Área do Shopping</label>
    		<select class="form-control" name="area_id">
    			<option value="">Selecione</option>
    			<?php foreach($areas as $key => $val): ?>
    				<option value="<?=$val['id']?>"
                    <?=$val['id'] == $model['area_id']?"selected":""?>>
                        <?=$val['nome']?>
                    </option>
    			<?php endforeach; ?>
    		</select>
    	</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-warning']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
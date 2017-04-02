<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gastronomia-form">

    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
    	<legend>Informações Gerais</legend>
	 	<?= $form->field($model_foto, 'nome_arquivo')->fileInput() ?>
	    <div class="row">
	    	<div class="col-md-4">
				<?= $form->field($model, 'nome_loja')->textInput(['maxlength' => true]) ?>    		
	    	</div>
<!-- 	    	<input type="text" id="gastronomia-nome_loja" class="form-control" name="Gastronomia[nome_loja]" maxlength="50" aria-required="true" aria-invalid="true"> -->
	    	<div class="col-md-4">
	    		<label for="Gastronomia[categoria_id]">Categoria</label>
	    		<select name="Gastronomia[categoria_id]" class="form-control">
	    			<?php foreach($categorias as $key => $val): ?>
	    				<option value="<?=$val['id']?>"><?=$val['nome']?></option>
	    			<?php endforeach; ?>
	    		</select>
	    	</div>
	    	<div class="col-md-4">
	    		<?= $form->field($model, 'localizacao')->textInput() ?>
	    	</div>
	    </div>

	    <?= $form->field($model, 'descricao')->textarea(['rows' => 4]) ?>
	</fieldset>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Atualizar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

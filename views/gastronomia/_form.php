<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gastronomia-form">

    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
    	<legend>Informações Gerais</legend>
    	<?php if(isset($pesquisa['nome_arquivo'])): 
			$caminhoImg = "/arquivos/".$pesquisa["nome_arquivo"];
    		$altImg = $pesquisa['descricao_foto']; 
    	?>
    		<img src="<?=Url::base()?>/<?=$caminhoImg?>" alt="<?=$altImg?>" class="imgSmall">
    	<?php endif; ?>
	 	<?= $form->field($model_foto, 'nome_arquivo')->fileInput() ?>
	    <div class="row">
	    	<div class="col-md-4">
				<?= $form->field($model, 'nome_loja')->textInput(['maxlength' => true]) ?>    		
	    	</div>
	    	<div class="col-md-4">
	    		<label for="Gastronomia[categoria_id]">Categoria</label>
	    		<select name="Gastronomia[categoria_id]" class="form-control">
	    			<?php foreach($categorias as $key => $val): 
	    				$selecionado = isset($categoria_id) && $val['id'] == $categoria_id?"selected":""
	    			?>

	    				<option value="<?=$val['id']?>" <?=$selecionado?>>
	    					<?=$val['nome']?>
	    				</option>
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

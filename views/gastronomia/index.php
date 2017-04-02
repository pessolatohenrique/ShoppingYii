<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gastronomia';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gastronomia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        Utilize o formulário abaixo para pesquisar as lojas de gastronomia presentes no Shopping
    </p>
    <?php $form = ActiveForm::begin(['method' => 'GET']); ?>
    	<div class="row">
    		<div class="col-md-4">
    			<div class="form-group">
    				<label for="loja">Loja</label>
    				<input type="text" name="loja" class="form-control">
    			</div>
    		</div>
    		<div class="col-md-4">
    			<div class="form-group">
    				<label for="categoria">Categoria</label>
    				<select name="categoria" class="form-control">
    					<option value="">Selecione</option>
    					<?php foreach($categorias as $key => $val): ?>
    						<option value="<?=$val['id']?>"><?=$val['nome']?> (<?=$val['total_categoria']?>)</option>
    					<?php endforeach; ?>
    				</select>
    			</div>
    		</div>
    		<div class="col-md-4">
    			<div class="form-group">
    				<label for="descricao">Descrição</label>
    				<input type="text" name="descricao" class="form-control">
    			</div>
    		</div>
    	</div>
		<button type="submit" class="btn btn-primary">Pesquisar</button>
		<button type="reset" class="btn btn-warning">Limpar</button>
    <?php ActiveForm::end() ?>
    <br>
    <table class="table table-bordered">
    	<tr class="bg-info">
    		<th>Loja</th>
    		<th>Categoria</th>
    		<th>Descrição</th>
    		<th>Localização</th>
    		<th></th>
    		<th></th>
    	</tr>
    	<?php foreach($lojas_gastronomia as $key => $val):?>
    		<tr>
    			<td><?=$val['nome_loja']?></td>
    			<td><?=$val['categoria_nome']?></td>
    			<td><?=$val['descricao']?></td>
    			<td><?=$val['localizacao']?></td>
    			<td></td>
    			<td></td>
    		</tr>
    	<?php endforeach; ?>
    </table>
</div>

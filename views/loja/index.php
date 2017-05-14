<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping | Lojas';
$this->params['breadcrumbs'][] = "Lojas";
?>
<div class="lojas-index">
    <h1>Lojas</h1>
    <p>
        Utilize o formulário abaixo para pesquisar as lojas presentes no Shopping
    </p>
    <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
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
                    <select name="categoria[]" class="form-control comboMulti" multiple="multiple">
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
    <?php if(count($lojas) == 0): ?>
        <div class="alert alert-info">
            Nenhum resultado encontrado. Refaça a sua pesquisa!
        </div>
    <?php endif; ?>
    <?php if(count($lojas) > 0): ?>
        <table class="table table-bordered tabela-lojas">
            <tr class="bg-info">
                <th>Loja</th>
                <th>Categoria</th>
                <th>Descrição</th>
                <th>Localização</th>
                <th></th>
                <th></th>
            </tr>
            <?php foreach($lojas as $key => $val):?>
                <tr>
                    <td>
                        <a href="<?=Url::base()?>/index.php?r=loja/view&id=<?=$val['id']?>">
                            <?=$val['nome_loja']?>
                        </a>
                    </td>
                    <td><?=$val['categoria_nome']?></td>
                    <td><?=$val['descricao']?></td>
                    <td><?=$val['localizacao']?></td>
                    <td>
                        <a href="<?=Url::base();?>/index.php?r=loja/update&id=<?=$val['id']?>">
                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                        </a>            
                    </td>
                    <td>
                        <?php $form = ActiveForm::begin([
                                'action' => Url::base()."/index.php?r=loja/exclui",
                                'id' => 'formulario'
                            ])?>
                            <input type="hidden" name="loja_id" value="<?=$val['id']?>">
                            <button class="btn btn-link">
                                <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                            </button>
                        <?php ActiveForm::end() ?>            
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

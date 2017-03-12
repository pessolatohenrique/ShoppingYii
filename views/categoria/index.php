<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Resultado: <strong><?=count($categorias)?></strong> categorias encontradas em sua busca</p>
    <p>
        <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-bordered tabela-categorias">
        <thead>
            <tr class="bg-info">
               
                <th>Categoria</th>
                <th>Área</th>
                <th>Qtd. Lojas</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <!-- http://localhost/Projetos/ShoppingYii/web/index.php?r=categoria/update&id=5 !-->
        <?php foreach($categorias as $key => $val): ?>
            <tr>
                <td><?=$val['nome']?></td>
                <td>
                    <a href="<?=Url::base();?>/index.php?r=categoria/index&area_id=<?=$val['area_id']?>"><?=$val['area_nome']?></a>
                </td>
                <td>00</td>
                <td>
                    <a href="<?=Url::base();?>/index.php?r=categoria/update&id=<?=$val['id']?>">
                        <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                    </a>
                </td>
                <td>
                    <?php $form = ActiveForm::begin([
                        'action' => Url::base()."/index.php?r=categoria/exclui",
                        'id' => 'formulario'
                    ])?>
                        <input type="hidden" name="categoria_id" value="<?=$val['id']?>">
                        <button class="btn btn-link">
                            <i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
                        </button>
                    <?php ActiveForm::end() ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */

$this->title = "Shopping | ".$model['nome_loja'];
$this->params['breadcrumbs'][] = ['label' => 'Gastronomias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model['nome_loja'];
if(isset($model['nome_arquivo'])){
    $caminhoImg = "/arquivos/".$model["nome_arquivo"];
    $altImg = $model['descricao_foto'];
}else{
    $caminhoImg = "/arquivos/naoDisponivel.jpg";
    $altImg = "Imagem da loja <strong>".$model['nome_loja']."</strong> ainda não disponível";
}
?>
<div class="gastronomia-view">
    <input type="hidden" name="gastronomia_id" id="gastronomia_id" value="<?=$model['id']?>">
    <input type="hidden" id="urlForm" value="<?=Url::base()?>">
    <h1><?=$model['nome_loja']?></h1>
    <div class="row">
        <div class="col-md-5 fotoLojaConsulta">
            <figure>
                <img src="<?=Url::base()?>/<?=$caminhoImg?>" alt="<?=$altImg?>">
                <figcaption><?=$altImg?></figcaption>
            </figure>
        </div>
        <div class="col-md-7 tabelaView">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-info">
                        <td colspan="3">Informações Gerais</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Categoria</td>
                        <td><?=$model['categoria_nome']?></td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td><?=$model['descricao']?></td>
                    </tr>
                    <tr>
                        <td>Localização</td>
                        <td><?=$model['localizacao']?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="cardapio_gastronomia">
        <h3>Cardápio</h3>
        <p>
            Confira abaixo as opções servidas neste estabelecimento. Utilize o campo abaixo caso deseje adicionar um novo tipo de cardapío ou novos itens.
        </p>
        <div class="row">
            <div class="col-md-6">
                <select class="form-control" name="tipo_cardapio_form" id="tipo_cardapio_form">
                    <option value="">Selecione</option>
                    <?php foreach($tipos_todos as $key => $val): ?>
                        <option value="<?=$val['id']?>"><?=$val['tipo']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="button" class="btn btn-primary adicionaTipoCardapio">Adicionar</button>
        </div>
        <br>
        <div class="row linhaCardapio">
            <?php foreach($tipos_cardapio as $key => $val): 
                $tipo_id = $val['cardapioTipo_id'];
            ?>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <input type="hidden" id="tipo_cardapio_id" value="<?=$tipo_id?>">
                            <span class="tituloCardapio"><?=$val['tipo_cardapio']?></span>
                            <a href="#" class="addItem">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Adicionar Item
                            </a>
                        </div>
                        <div class="panel-body">
                            <ul>
                            <?php 
                            foreach($itens as $key => $val): 
                                if($val['cardapioTipo_id'] == $tipo_id):
                            ?>
                                    <li>
                                        <span class="item_cardapio"><?=$val['nome_item']?></span> - 
                                        <span class="descricao_cardapio"><?=$val['descricao']?></span> 
                                        <span class="precoCardapio">R$ <?=number_format($val['preco'],2,",",".")?></span>
                                    </li>
                            <?php 
                                endif;
                            endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="itemDialog dialog">
    <h3>Adicionar Item</h3>
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nome_item">Item</label>
                    <input type="text" name="nome_item" id="nome_item" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descricao_item">Descrição</label>
                    <input type="text" name="descricao_item" id="descricao_item" class="form-control">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="preco_item">Preço</label>
                    <input type="text" name="preco_item" id="preco_item" class="form-control">
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    <button type="button" class="btn btn-success fecharDialog">Fechar</button>
    <button type="button" class="btn btn-primary adicionaItem">Salvar</button>
</div>
<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

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
        <p>Confira abaixo as opções servidas neste estabelecimento</p>
        <div class="row">
            <?php foreach($tipos_cardapio as $key => $val): 
                $tipo_id = $val['cardapioTipo_id'];
            ?>
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><?=$val['tipo_cardapio']?></div>
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
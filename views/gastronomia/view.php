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
</div>

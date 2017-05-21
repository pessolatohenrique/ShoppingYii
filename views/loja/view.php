<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Gastronomia */

$this->title = "Shopping | ".$model['nome_loja'];
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
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
    <input type="hidden" name="loja_id" id="loja_id" value="<?=$model['id']?>">
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
    <h3>Categorias de Produtos</h3>
    <div class="row">
        <div class="col-md-4">
            <select class="form-control comboSearch" name="categoria_id" id="categoria_id">
            <?php foreach($categorias_produtos as $key => $val): ?>
                <option value="<?=$val->id?>"><?=$val->nome?></option>
            <?php endforeach; ?>
            </select>
            <a href="#" data-toggle="modal" data-target="#modalCategoria">Não encontrou a categoria do produto?</a>
        </div>
        <button type="button" class="btn btn-primary" id="vincular_categoria">Vincular</button>
    </div>
    <br>
    <section class="categorias_produtos">
        <?php foreach($categorias_salvas as $key => $val): ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <input type="hidden" id="categoria_painel_id" value="<?=$val['categoria_id']?>">
                    <span class="categoria_painel"><?=$val['categoria_nome']?></span>
                    <a href="#" class="excluirVinculo">
                        <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        Excluir Vínculo
                    </a>
                </div>
                <div class="panel-body">Sem subcategorias vinculadas</div>
            </div>
        <?php endforeach; ?>
    </section>
</div>
<!-- Modal de Categoria -->
  <div class="modal fade" id="modalCategoria" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Adicionar Categoria (Produto)</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="categoria_dialog">Categoria</label>
                <input type="text" name="categoria_dialog" id="categoria_dialog" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="salvar_dialog">Salvar</button>
          <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
        </div>
      </div>
      
    </div>
</div>
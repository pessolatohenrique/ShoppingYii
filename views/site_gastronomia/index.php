<?php
use yii\helpers\Url; 
$this->title = 'Shopping | Gastronomia';
?>
<h1>Gastronomia</h1>
<div class="container">
	<input type="hidden" id="urlForm" value="<?=Url::base()?>">
	<section class="categorias categoriasGastronomia">
		<h3>Categorias</h3>
		<form action="" method="GET">
			<input type="search" name="busca" placeholder="Realize a busca aqui!" class="campoPesquisa" id="pesquisaGastro">
		</form>
		<ul>
      	<?php foreach($categorias as $key => $val): ?>
			<li>
				<input type="hidden" class="categoria_id" value="<?=$val['id']?>">
				<a href="#" class="linkPesquisaCategoria"><?=$val['nome']?> (<?=$val['total_categoria']?>)</a>
			</li>
		<?php endforeach; ?>
		</ul>
	</section>
	<section class="painel_itens">
    <?php foreach($lojas as $key => $val): ?>
		<ul class="itemPainel">
			<li>
				<h4><a href="#"><?=$val['nome_loja']?></a></h4>
				<ul>
					<li><?=substr($val['descricao'],0,50)?></li>
					<li>
						<span class="categoriaItem"><?=$val['categoria_nome']?></span>
					</li>
					<li><?=$val['localizacao']?></li>
				</ul>
			</li>
		</ul>
	<?php endforeach; ?>
	</section>
</div>
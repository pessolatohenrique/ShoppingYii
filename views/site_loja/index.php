<?php
	use yii\helpers\Url; 
	$this->title = 'Shopping | Lojas';
?>
<h1>Lojas</h1>
<div class="container">
	<section class="categorias categoriasGastronomia">
		<h3>Categorias</h3>
		<form action="" method="GET">
			<input type="search" name="busca" placeholder="Realize a busca aqui!" class="campoPesquisa" id="pesquisaLoja">
			<button type="button" class="botao-busca mostra-categorias">Categorias</button>
		</form>
		<ul>
			<?php foreach($categorias as $key => $val): ?>
				<li>
					<input type="hidden" class="categoria_id" value="<?=$val['id']?>">
					<a href="#" class="linkPesquisaLoja"><?=$val['nome']?> (<?=$val['total_categoria']?>)</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
	<section class="painel_itens">
		<?php foreach($lojas as $key => $val): ?>
			<ul class="itemPainel">
				<li>
					<h4><a href="<?=Url::base()?>/index.php?r=site_loja/search&loja_id=<?=$val['id']?>"><?=$val['nome_loja']?></a>
					</h4>
					<ul>
						<li><?=substr($val['descricao'],0,48)?></li>
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
<?php
use yii\helpers\Url;
$this->title = "Shopping | ".$model['nome_loja'];
?>
<h1><?=$model['nome_loja']?></h1>
<section class="informacoesConsulta">
	<figure>
		<img src="<?=Url::base()?>/arquivos/<?=$model['nome_arquivo']?>" alt="Imagem da loja <?=$model['nome_loja']?>">
		<figcaption>Foto da loja <strong><?=$model['nome_loja']?></strong></figcaption>
	</figure>
	<ul class="itensConsulta">
		<li>
			<strong>Categoria: </strong>
			<?=$model['categoria_nome']?>
		</li>
		<li>
			<strong>Descrição:</strong>
			<?=$model['descricao']?>
		</li>
		<li>
			<strong>Localização: </strong>
			<?=$model['localizacao']?>
		</li>
	</ul>
	<section class="lojasSemelhantes">
		<h3>Lojas Semelhantes</h3>
		<ul>
		<?php foreach($semelhantes as $key => $val):?>
			<li>
				<a href="<?=Url::base()?>/index.php?r=site_loja/search&loja_id=<?=$val['id']?>">
					<figure>
						<img src="<?=Url::base()?>/arquivos/<?=$val['nome_arquivo']?>" alt="<?=$val['nome_loja']?>">
						<figcaption><?=$val['nome_loja']?></figcaption>
					</figure>
				</a>
			</li>
		<?php endforeach; ?>
		</ul>
	</section>
</section>
<section class="subcategoriaConsulta">
	<h3>Categorias de Produtos</h3>
	<p>
		Confira abaixo as categorias e subcategorias de produtos oferecidos pela loja. As informações aqui apresentadas podem sofrer variações
	</p>
	<?php 
	foreach($categorias_salvas as $key => $val): 
	?>
		<div class="painel">
			<div class="painel_cabecalho"><?=$val['categoria_nome']?>
                <a href="#" class="minimizarPainel_user">
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                </a>
			</div>
			<div class="painel_corpo subcategorias_usuario">
			<?php
			if(count($subcategorias) > 0):
			?>
				<ul>
				<?php
				foreach($subcategorias as $chave => $valor):
					if($val['categoria_id'] == $valor['categoria_id']):
				?>
						<li><?=$valor['subcategoria_nome']?></li>
				<?php
					endif;
				endforeach;
				?>
				</ul>
			<?php
			else:
			?>
				<p>Sem subcategorias vinculadas</p>
			<?php
			endif;
			?>
			</div>
		</div>
	<?php
	endforeach;
	?>
</section>
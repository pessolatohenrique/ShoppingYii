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
				<a href="<?=Url::base()?>/index.php?r=site_gastronomia/search&gastronomia_id=<?=$val['id']?>">
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
<section class="cardapioConsulta">
	<h3>Cardápio</h3>
	<p>Confira o cardápio servido nesta loja gastronomica. Os itens e preços podem variar ou sofrer alterações.</p>
    <?php foreach($tipos_cardapio as $key => $val): 
        $tipo_id = $val['cardapioTipo_id']; ?>
		<div class="painel">
			<div class="painel_cabecalho"><?=$val['tipo_cardapio']?></div>
			<div class="painel_corpo">
				<ul>
				<?php foreach($itens as $key => $val): 
                      	if($val['cardapioTipo_id'] == $tipo_id): ?>
							<li>
								<span class="cardapioItem"><?=$val['nome_item']?></span>  
								<span class="cardapioDescricao">- <?=substr($val['descricao'],0,80)?></span>
								<span class="cardapioPreco">R$ <?=number_format($val['preco'],2,",",".")?></span>
							</li>
				<?php 
						endif;
					   endforeach; 
				?>
				</ul>
			</div>
		</div>
	<?php endforeach; ?>
</section>
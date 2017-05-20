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
<?php
use yii\helpers\Url;
$this->title = "Shopping | ".$filme_consulta['titulo'];
?>
<h1><?=$filme_consulta['titulo']?></h1>
<section class="detalhes-filme">
	<div class="poster-color">
		<div class="coluna-poster">
			<figure>
				<img src="<?=Url::base()?>/arquivos/<?=$filme_consulta['arquivo']?>" alt="Pôster do filme <?=$filme_consulta['titulo']?>">
				<figcaption>Pôster do filme</figcaption>
			</figure>
		</div>
	</div>
	<div class="coluna-filme">
		<div class="infoGerais-filme">
			<p>
				<strong>Diretor: </strong><?=$filme_consulta['diretor_nome']?><br>
				<strong>Estúdio: </strong><?=$filme_consulta['estudio_nome']?><br>
				<strong>Elenco:</strong><span class="label-atores"><?=$atores?><br>
				<strong>Sinopse:</strong><br>
				<?=$filme_consulta['sinopse']?>
			</p>
		</div>
		<ul class="etiquetas-filme">
            <li class="<?=$classe_status?>"><?=$filme_consulta['status_exibicao']?></li>
            <li class="<?=$classe_classificacao?>"><?=$classificacao?></li>
            <li><?=$filme_consulta['genero_nome']?></li>
            <li><?=$filme_consulta['duracao']?> minutos</li>
        </ul>
	</div>
	<div class="trailer-filme">
		<h3>Trailer</h3>
		<p>Confira abaixo o trailer do filme.</p>
		<iframe width="700" height="415" src="<?=$video_trailer?>" frameborder="0" allowfullscreen></iframe>
	</div>
</section>
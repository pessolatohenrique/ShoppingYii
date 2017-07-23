<?php
use yii\helpers\Url; 
$this->title = 'Shopping | Cinema';
$tamanho = count($dias_semana);
$tamanho--;
unset($dias_semana[$tamanho]);
?>
<h1>Cinema</h1>
<div class="container">
	<p>O cinema deste shopping é da rede <strong>Cinemark</strong></p>
	<section class="programacaoCinema">
		<div class="menuNavCinema">
			<ul>
				<li class="abaAtiva">
					<a href="#">
						<?=trim(Yii::$app->formatter->asDate($primeira_data->data_exibicao,'php:d/m'))?><br> <?=$primeira_data->dia_semana?>
					</a>
				</li>
				<?php 
  				foreach($dias_semana as $key => $val):
  				?>
					<li>
						<a href="#"><?=Yii::$app->formatter->asDate($val['data_exibicao'],'php:d/m')?><br> <?=$val['dia_semana']?>
						</a>
					</li>
				<?php
				endforeach;
				?>
			</ul>
		</div>
		<div class="filmesSemana">
			<div id="filme<?=$primeira_data->dia_semana?>" class="filmesCartaz">
		    <?php
    		foreach($filmes as $key => $val):
    		?>
				<div class="divulgacaoFilme">
					<h4><a href="<?=Url::base()?>/index.php?r=site_cinema/search&filme_id=<?=$val['filme_id']?>"><?=$val['titulo']?></a></h4>
					<p>
						<?=substr($val['sinopse'],0,200)?>(...) <a href="#">Leia Mais</a>
					</p>
        			<ul class="salas">
				        <?php
				        foreach($val['salas'] as $key_sala => $val_sala):
				            $array_horarios = $val_sala[0];
				            // var_dump($array_horarios);
				        ?>
				            <li>
				                <span class="numeroSala"><?=$val_sala['sala_nome']?></span>
				                <ul>
				                    <?php
				                    if($array_horarios[0]['flag3D'] == 1):
				                    ?>
				                        <li class="tresD">3D</li>
				                    <?php
				                    endif;
				                    ?>
				                    <?php
				                    if($array_horarios[0]['flagXD'] == 1):
				                    ?>
				                        <li class="xisD">XD</li>
				                    <?php
				                    endif;
				                    ?>
				                    <li class="idioma"><?=$array_horarios[0]['idioma']?></li>
				                    <?php
				                        foreach($array_horarios as $key_horario => $val_horario):
				                            $data_exibicao = $val_horario['data_exibicao'];
				                            $horario = substr($val_horario['horario'],0,5);
				                            if($data_exibicao == $primeira_data->data_exibicao):
				                    ?>
				                                <li><?=$horario?></li>
				                    <?php
				                            endif;
				                        endforeach;
				                    ?>
				                </ul>
				            </li>
				        <?php
				       endforeach;
				        ?>
        			</ul>
				</div>
			<?php
			endforeach;
			?>
			</div>
		    <?php 
    		foreach($dias_semana as $key_semana => $val_semana):
    		?>
				<div id="filme<?=$val_semana->dia_semana?>" class="filmesCartaz" style="display: none">
			        <?php
				        foreach($filmes as $key => $val):
				            // echo $val['titulo'];
				            $qtdHorarios = $val['salas'][0];
				            $exibido_em = $qtdHorarios[0][0]['data_exibicao'];
				            if($exibido_em == $val_semana->data_exibicao):
		        	?>
					<div class="divulgacaoFilme">
						<h4><a href="<?=Url::base()?>/index.php?r=site_cinema/search&filme_id=<?=$val['filme_id']?>"><?=$val['titulo']?></a></h4>
						<p>
							<?=substr($val['sinopse'],0,200)?> <a href="#">Leia Mais</a>
						</p>
		                <ul class="salas">
			                <?php
			                foreach($val['salas'] as $key_sala => $val_sala):
			                    $array_horarios = $val_sala[0];
			                    $data_exibicao = $array_horarios[0]['data_exibicao'];
			                    if($data_exibicao == $val_semana->data_exibicao):
			                ?>
			                        <li>
			                            <span class="numeroSala"><?=$val_sala['sala_nome']?></span>
			                            <ul>
			                                <?php
			                                if($array_horarios[0]['flag3D'] == 1):
			                                ?>
			                                    <li class="tresD">3D</li>
			                                <?php
			                                endif;
			                                ?>
			                                <?php
			                                if($array_horarios[0]['flagXD'] == 1):
			                                ?>
			                                    <li class="xisD">XD</li>
			                                <?php
			                                endif;
			                                ?>
			                                <li class="idioma"><?=$array_horarios[0]['idioma']?></li>
			                                <?php
			                                    foreach($array_horarios as $key_horario => $val_horario):
			                                        $data_exibicao = $val_horario['data_exibicao'];
			                                        $horario = substr($val_horario['horario'],0,5);
			                                        if($data_exibicao == $val_semana->data_exibicao):
			                                ?>
			                                            <li><?=$horario?></li>
			                                <?php
			                                        endif;   
			                                    endforeach;
			                                ?>
			                            </ul>
			                        </li>
		                <?php
		                    	endif;
		               		endforeach;
		           endif;
		            ?>
		            	</ul>
		            <?php
		            endforeach;
		        endforeach;
		            ?>
				</div>
			</div>
		</div>
	</section>
	<section class="anunciosCinema">
		<ul>
			<li>
				<a href="#">
					<figure>
						<img src="img/CinemarkMania.png" alt="Cinemark Mania">
					</figure>
				</a>
			</li>
			<li>
				<a href="#">
					<figure>
						<img src="img/SnackBar.png" alt="Snackbar">
					</figure>
				</a>
			</li>
			<li>
				<a href="#">
					<figure>
						<img src="img/AluguelSalas.png" alt="Aluguel de salas">
					</figure>
				</a>
			</li>
		</ul>
	</section>
</div>
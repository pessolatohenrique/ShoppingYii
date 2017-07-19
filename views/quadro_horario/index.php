<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping | Agenda de Filmes';
$this->params['breadcrumbs'][] = "Agenda de Filmes";
// // var_dump($dias_semana); die;
$tamanho = count($dias_semana);
$tamanho--;
unset($dias_semana[$tamanho]);
?>
<ul class="nav nav-tabs">
  <li class="active">
      <a data-toggle="tab" href="#<?=Yii::$app->formatter->asDate($primeira_data->data_exibicao,'php:Ymd')?>">
          <?=Yii::$app->formatter->asDate($primeira_data->data_exibicao,'php:d/m')?><br>
          <?=$primeira_data->dia_semana?>
       </a>
  </li>
  <?php 
  foreach($dias_semana as $key => $val):
  ?>
        
        <li>
            <a data-toggle="tab" href="#<?=Yii::$app->formatter->asDate($val['data_exibicao'],'php:Ymd')?>">        
                <?=Yii::$app->formatter->asDate($val['data_exibicao'],'php:d/m')?><br>
                <?=$val['dia_semana']?>
            </a>
        </li>
  <?php
  endforeach;
  ?>
</ul>

<div class="tab-content">
    <div id="<?=Yii::$app->formatter->asDate($primeira_data->data_exibicao,'php:Ymd')?>" class="tab-pane fade in active painel-filmes">
    <?php
    foreach($filmes as $key => $val):
    ?>
        <h3><?=$val['titulo']?></h3>
        <p>
            <?=$val['sinopse']?>
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
    <?php
    endforeach;
    ?>
    </div>

    <?php 
    foreach($dias_semana as $key_semana => $val_semana):
    ?>
        <div id="<?=Yii::$app->formatter->asDate($val_semana->data_exibicao,'php:Ymd')?>" class="tab-pane fade in painel-filmes">
        <?php
        foreach($filmes as $key => $val):
            // echo $val['titulo'];
            $qtdHorarios = $val['salas'][0];
            $exibido_em = $qtdHorarios[0][0]['data_exibicao'];
            if($exibido_em == $val_semana->data_exibicao):
        ?>
                <h3><?=$val['titulo']?></h3>
                <p>
                    <?=$val['sinopse']?>
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
        ?>
    <?php
    endforeach;
    ?>
    </div>
</div>
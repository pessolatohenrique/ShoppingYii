<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping | Filmes';
$this->params['breadcrumbs'][] = "Filmes";
?>
<div class="filme-index">
    <h1>Filmes</h1>
    <!-- 
    Listar filmes cadastrados com os campos: título, gênero, classificação, duração em minutos, status, estúdio, diretor, sinopse resumida
    !-->
    <table class="table table-bordered">
        <thead>
            <tr class="bg-info">
                <th>Título</th>
                <th>Gênero</th>
                <th>Classificação</th>
                <th>Duração</th>
                <th>Status</th>
                <th>Estúdio</th>
                <th>Diretor</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($filmes as $key => $val):
        ?>
            <tr>
                <td>
                    <a href="#">
                        <?=$val['titulo']?>
                    </a>
                </td>
                <td><?=$val['genero_nome']?></td>
                <td><?=$val['classificacao']?></td>
                <td><?=$val['duracao']?> minutos</td>
                <td><?=$val['status_exibicao']?></td>
                <td><?=$val['estudio_nome']?></td>
                <td><?=$val['diretor_nome']?></td>
               
            </tr>
        <?php
        endforeach;
        ?>
        </tbody>
    </table>
</div>

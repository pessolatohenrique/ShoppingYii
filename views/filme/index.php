<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shopping | Filmes';
$this->params['breadcrumbs'][] = "Filmes";
?>
<div class="filme-index">
    <h1>Filmes</h1>
    <p>
        Utilize o formulário abaixo para pesquisar os filmes cadastrados na base de dados.
    </p>
    <!--
    Pesquisa de filmes cadastrados. Campos permitidos: , , classificação, duração (maior que), status, , 
    !-->
    <?php $form = ActiveForm::begin(['method' => 'POST']); ?>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="Filme[titulo]" class="form-control" id="titulo">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <select name="Filme[genero][]" class="form-control comboMulti" multiple="multiple" id="genero">
                        <option value="">Selecione</option>
                        <?php foreach($generos as $key => $val): ?>
                            <option value="<?=$val['id']?>"><?=$val['descricao']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estudio">Estúdio</label>
                    <select name="Filme[estudio][]" class="form-control comboMulti" multiple="multiple" id="estudio">
                        <option value="">Selecione</option>
                        <?php foreach($distribuidoras as $key => $val): ?>
                            <option value="<?=$val['id']?>"><?=$val['nome']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="diretor">Diretor</label>
                    <select name="Filme[diretor][]" class="form-control comboMulti" multiple="multiple" id="diretor">
                        <option value="">Selecione</option>
                        <?php foreach($diretores as $key => $val): ?>
                            <option value="<?=$val['id']?>"><?=$val['nome']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="Filme[status][]" class="form-control comboMulti" multiple="multiple" id="status">
                        <option value="">Selecione</option>
                        <?php foreach($status_exibicao as $key => $val): ?>
                            <option value="<?=$val['id']?>"><?=$val['descricao']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="classificacao">Classificação Indicativa</label>
                    <select name="Filme[classificacao][]" class="form-control comboMulti" multiple="multiple" id="classificacao">
                        <option value="">Selecione</option>
                        <?php foreach($classificacoes as $key => $val): ?>
                            <option value="<?=$val['id']?>"><?=$val['descricao']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="duracao">Duração em minutos</label>
                    <input type="text" name="Filme[duracao]" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Pesquisar</button>
        <button type="reset" class="btn btn-warning">Limpar</button>
    <?php ActiveForm::end(); ?>
    <br>
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

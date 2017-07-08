<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Filme */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="filme-form">
    <p>Para o campo <strong>Trailer</strong>, coloque um link do Youtube</p>
    <?php $form = ActiveForm::begin(); ?>
    <fieldset>
        <legend>Informações Gerais</legend>
        <?= $form->field($model_foto, 'nome_arquivo')->fileInput() ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="genero">Gênero</label>
                    <select name="Filme[genero_id]" class="form-control comboSearch" id="genero">
                        <?php foreach($generos as $key => $val): ?>
                            <option value="<?=$val->id?>"
                            <?=$val->id == $model->genero_id?"selected":""?>>
                                <?=$val->descricao?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <a href="#" data-toggle="modal" data-target="#addGenero">Não encontrou o gênero?</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estudio">Estúdio</label>
                    <select name="Filme[distribuidora_id]" class="form-control comboSearch" id="estudio">
                        <?php foreach($estudios as $key => $val): ?>
                            <option value="<?=$val->id?>"
                            <?=$val->id == $model->distribuidora_id?"selected":""?>>
                                <?=$val->nome?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'trailer')->textInput() ?>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="diretor">Diretor</label>
                    <select name="Filme[diretor_id]" class="form-control comboSearch" id="diretor">
                        <?php foreach($diretores as $key => $val): ?>
                            <option value="<?=$val->id?>"
                            <?=$val->id == $model->diretor_id?"selected":""?>>
                                <?=$val->nome?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="genero">Status</label>
                    <select name="Filme[status_id]" class="form-control comboSearch" id="status">
                        <?php foreach($status as $key => $val): ?>
                            <option value="<?=$val->id?>"
                            <?=$val->id == $model->status_id?"selected":""?>>
                                <?=$val->descricao?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="genero">Classificação Indicativa</label>
                    <select name="Filme[classificacao_id]" class="form-control comboSearch" id="classificacao">
                        <?php foreach($classificacoes as $key => $val): ?>
                            <option value="<?=$val->id?>"
                            <?=$val->id == $model->classificacao_id?"selected":""?>>
                                <?=$val->descricao?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'duracao')->textInput(['type' => 'number']) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'sinopse')->textArea(['rows' => 4]) ?>
            </div>
        </div>
    </fieldset>
    <button type="submit" class="btn btn-primary linkConfirmForm"><?=isset($model['id'])?"Atualizar":"Adicionar"?></button>
    <button type="reset" class="btn btn-warning">Limpar</button>
    <?php ActiveForm::end(); ?>
</div>
<!-- Modal de Gênero !-->
<div id="addGenero" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Adicionar Gênero</h4>
          </div>
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="genero_dialog">Gênero</label>
                            <input type="text" id="genero_dialog" class="form-control">
                        </div>
                    </div>
                </div>
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn_add_genero">Adicionar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>
  </div>
</div>
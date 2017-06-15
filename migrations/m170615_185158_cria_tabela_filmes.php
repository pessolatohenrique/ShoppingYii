<?php

use yii\db\Migration;

class m170615_185158_cria_tabela_filmes extends Migration
{
    public function up()
    {
        $this->createTable('filmes',[
            'id' => $this->primaryKey(),
            'status_id' => $this->integer(),
            'genero_id' => $this->integer(),
            'distribuidora_id' => $this->integer(),
            'diretor_id' => $this->integer(),
            'classificacao_id' => $this->integer(),
            'titulo' => $this->string(200)->notNull()->unique(),
            'duracao' => $this->string(3),
            'sinopse' => $this->string(),
            'trailer' => $this->string(),
            'arquivo' => $this->string()
        ]);
        $this->addForeignKey('fk-statusrel-status_id','filmes','status_id','status_exibicao','id','CASCADE');
        $this->addForeignKey('fk-generos-genero_id','filmes','genero_id','generos','id','CASCADE');
        $this->addForeignKey('fk-distribuidoras-distribuidora_id','filmes','distribuidora_id','distribuidoras','id','CASCADE');
        $this->addForeignKey('fk-diretores-diretor_id','filmes','diretor_id','diretores','id','CASCADE');
        $this->addForeignKey('fk-classificacoes-classificacao_id','filmes','classificacao_id','classificacoes_indicativas','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("filmes");
    }
}

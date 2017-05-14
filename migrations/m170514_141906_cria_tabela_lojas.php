<?php

use yii\db\Migration;

class m170514_141906_cria_tabela_lojas extends Migration
{
    public function up()
    {
        $this->createTable('lojas',[
            'id' => $this->primaryKey(),
            'categoria_id' => $this->integer(),
            'nome_loja' => $this->string(50)->notNull()->unique(),
            'descricao' => $this->text(),
            'localizacao' => $this->text()
        ]);
        $this->addForeignKey('fk-categoriasloja-categoria_id','lojas','categoria_id','categorias','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("lojas");
    }
}

<?php

use yii\db\Migration;

class m170523_010504_cria_tabela_subcategoriaprodutos extends Migration
{
    public function up()
    {
        $this->createTable("subcategoriaprodutos",[
            'id' => $this->primaryKey(),
            'categoria_id' => $this->integer(),
            'nome' => $this->string(150)->notNull()->unique()
        ]);
        $this->addForeignKey('fk-subcategoria-categoria_id','subcategoriaprodutos','categoria_id','categoriaProdutos','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("subcategoriaprodutos");
    }
}

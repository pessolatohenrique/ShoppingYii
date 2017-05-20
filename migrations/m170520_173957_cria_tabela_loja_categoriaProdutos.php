<?php

use yii\db\Migration;

class m170520_173957_cria_tabela_loja_categoriaProdutos extends Migration
{
    public function up()
    {
        $this->createTable('lojas_categoriaProdutos',[
            'loja_id' => $this->integer(),
            'categoria_id' => $this->integer()
        ]);
         $this->addForeignKey('fk-lojasrel-loja_id','lojas_categoriaProdutos','loja_id','lojas','id','CASCADE');
         $this->addForeignKey('fk-categoriasrel-categoria_id','lojas_categoriaProdutos','categoria_id','categoriaProdutos','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("lojas_categoriaProdutos");
    }
}

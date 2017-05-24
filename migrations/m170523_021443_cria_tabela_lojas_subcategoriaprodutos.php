<?php

use yii\db\Migration;

class m170523_021443_cria_tabela_lojas_subcategoriaprodutos extends Migration
{
    public function up()
    {
        $this->createTable('lojas_subcategoriaprodutos',[
            'id' => $this->primaryKey(),
            'loja_id' => $this->integer(),
            'subcategoria_id' => $this->integer()
        ]);
         $this->addForeignKey('fk-lojasrel2-loja_id','lojas_subcategoriaprodutos','loja_id','lojas','id','CASCADE');
         $this->addForeignKey('fk-categoriasrel-subcategoria_id','lojas_subcategoriaprodutos','subcategoria_id','subcategoriaprodutos','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("lojas_subcategoriaprodutos");
    }
}

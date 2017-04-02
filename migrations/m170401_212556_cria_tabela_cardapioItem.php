<?php

use yii\db\Migration;

class m170401_212556_cria_tabela_cardapioItem extends Migration
{
    public function up()
    {
        $this->createTable('cardapioItens',[
            'id' => $this->primaryKey(),
            'gastronomia_id' => $this->integer(),
            'cardapioTipo_id' => $this->integer(),
            'nome_item' => $this->string(50),
            'descricao' => $this->text(),
            'preco' => $this->decimal()
        ]);
         $this->addForeignKey('fk-gastronomia-gastronomia2_id','cardapioItens','gastronomia_id','gastronomia','id','CASCADE');
         $this->addForeignKey('fk-cardapioTipo-cardapioTipo2_id','cardapioItens','cardapioTipo_id','cardapioTipo','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("cardapioItens");
    }
}

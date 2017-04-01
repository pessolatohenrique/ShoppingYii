<?php

use yii\db\Migration;

class m170401_211751_cria_tabela_cardapioTipo_gastronomia extends Migration
{
    public function up()
    {
        $this->createTable('cardapioTipo_gastronomia',[
            'gastronomia_id' => $this->integer(),
            'cardapioTipo_id' => $this->integer()
        ]);
        $this->addForeignKey('fk-gastronomia-gastronomia_id','cardapioTipo_gastronomia','gastronomia_id','gastronomia','id','CASCADE');
        $this->addForeignKey('fk-cardapioTipo-cardapioTipo_id','cardapioTipo_gastronomia','cardapioTipo_id','cardapioTipo','id','CASCADE');
    }
    public function down()
    {
        $this->dropTable("cardapioTipo_gastronomia");
    }
}

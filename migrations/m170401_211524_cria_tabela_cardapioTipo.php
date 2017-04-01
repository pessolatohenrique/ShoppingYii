<?php

use yii\db\Migration;

class m170401_211524_cria_tabela_cardapioTipo extends Migration
{
    public function up()
    {
        $this->createTable('cardapioTipo',[
            'id' => $this->primaryKey(),
            'tipo' => $this->string(30)
        ]);
    }
    public function down()
    {
        $this->dropTable("cardapioTipo");
    }
}

<?php

use yii\db\Migration;

class m170711_221117_cria_tabela_atores extends Migration
{
    public function up()
    {
        $this->createTable('atores',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(200)->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable("atores");
    }
}

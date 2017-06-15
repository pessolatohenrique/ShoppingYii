<?php

use yii\db\Migration;

class m170615_184109_cria_tabela_distribuidoras extends Migration
{
    public function up()
    {
        $this->createTable('distribuidoras',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(200)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("distribuidoras");
    }
}

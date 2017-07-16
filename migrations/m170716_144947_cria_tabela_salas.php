<?php

use yii\db\Migration;

class m170716_144947_cria_tabela_salas extends Migration
{
    public function up()
    {
        $this->createTable('salas',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(20),
            'capacidade' => $this->integer()
        ]);
    }

    public function down()
    {
        $this->dropTable("salas");
    }
}

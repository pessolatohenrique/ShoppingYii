<?php

use yii\db\Migration;

class m170615_184430_cria_tabela_diretores extends Migration
{
    public function up()
    {
        $this->createTable('diretores',[
            'id' => $this->primaryKey(),
            'nome' => $this->string(200)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("diretores");
    }
}

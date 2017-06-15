<?php

use yii\db\Migration;

class m170615_183836_cria_tabela_generos extends Migration
{
    public function up()
    {
        $this->createTable('generos',[
            'id' => $this->primaryKey(),
            'descricao' => $this->string(20)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("generos");
    }
}

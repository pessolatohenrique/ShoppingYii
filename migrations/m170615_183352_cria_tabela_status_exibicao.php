<?php

use yii\db\Migration;

class m170615_183352_cria_tabela_status_exibicao extends Migration
{
    public function up()
    {
        $this->createTable('status_exibicao',[
            'id' => $this->primaryKey(),
            'descricao' => $this->string(20)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("status_exibicao");
    }
}

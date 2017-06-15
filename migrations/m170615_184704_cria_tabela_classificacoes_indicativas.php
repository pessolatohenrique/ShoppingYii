<?php

use yii\db\Migration;

class m170615_184704_cria_tabela_classificacoes_indicativas extends Migration
{
    public function up()
    {
        $this->createTable('classificacoes_indicativas',[
            'id' => $this->primaryKey(),
            'descricao' => $this->string(15)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("classificacoes_indicativas");
    }
}

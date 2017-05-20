<?php

use yii\db\Migration;

class m170520_172716_cria_tabela_categoriaProdutos extends Migration
{
    public function up()
    {
        $this->createTable("categoriaProdutos",[
            'id' => $this->primaryKey(),
            'nome' => $this->string(150)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("categoriaProdutos");
    }
}

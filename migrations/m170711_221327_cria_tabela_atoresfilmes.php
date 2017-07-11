<?php

use yii\db\Migration;

class m170711_221327_cria_tabela_atoresfilmes extends Migration
{
    public function up()
    {
        $this->createTable('atoresfilmes',[
            'ator_id' => $this->integer(),
            'filme_id' => $this->integer(),
            'personagem' => $this->string(200)
        ]);
        $this->addForeignKey('fk-atorel-ator_id','atoresfilmes','ator_id','atores','id','CASCADE');
        $this->addForeignKey('fk-filmerel2-filme_id','atoresfilmes','filme_id','filmes','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("atoresfilmes");
    }
}

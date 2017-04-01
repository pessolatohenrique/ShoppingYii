<?php

use yii\db\Migration;

class m170401_210031_cria_tabela_fotos extends Migration
{
    public function up()
    {
         $this->createTable('fotos',[
            'id' => $this->primaryKey(),
            'loja_id' => $this->integer(),
            'nome_arquivo' => $this->string(255),
            'descricao' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable("fotos");
    }
}

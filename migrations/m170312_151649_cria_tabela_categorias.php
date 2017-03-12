<?php
use yii\db\Migration;
/*Cria a tabela de categorias*/
class m170312_151649_cria_tabela_categorias extends Migration
{
    public function up()
    {
        $this->createTable("categorias",[
            'id' => $this->primaryKey(),
            'nome' => $this->string(50)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("categorias");
    }
}

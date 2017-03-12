<?php
use yii\db\Migration;
/*Cria a tabela de áreas para o Shopping. Exemplo de áreas: lojas, gastronomia, lazer, etc.*/
class m170312_170644_cria_tabela_areas extends Migration
{
    public function up()
    {
        $this->createTable("areas",[
            'id' => $this->primaryKey(),
            'nome' => $this->string(40)->notNull()->unique()
        ]);
    }

    public function down()
    {
        $this->dropTable("categorias");
    }
}

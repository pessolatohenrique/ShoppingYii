<?php
use yii\db\Migration;
/*adiciona a coluna area_id e relaciona com o ID da tabela areas*/
class m170312_171149_adiciona_coluna_tabela_categorias extends Migration
{
    public function up()
    {
        $this->addColumn('categorias', 'area_id', $this->integer());
        $this->addForeignKey(
            'fk-areas-area_id',
            'categorias',
            'area_id',
            'areas',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropColumn("categorias","area_id");
    }
}
/*
        // add foreign key for table `post`
        $this->addForeignKey(
            'fk-post_tag-post_id',
            'post_tag',
            'post_id',
            'post',
            'id',
            'CASCADE'
        );
*/
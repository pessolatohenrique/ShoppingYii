<?php

use yii\db\Migration;

class m170401_141149_cria_tabela_gastronomia extends Migration
{
    public function up()
    {
        $this->createTable('gastronomia',[
            'id' => $this->primaryKey(),
            'categoria_id' => $this->integer(),
            'nome_loja' => $this->string(50)->notNull()->unique(),
            'descricao' => $this->text(),
            'localizacao' => $this->text()
        ]);
        $this->addForeignKey('fk-categorias-categoria_id','gastronomia','categoria_id','categorias','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("gastronomia");
    }
}

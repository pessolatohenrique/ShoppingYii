<?php

use yii\db\Migration;

class m170716_145313_cria_tabela_quadro_horarios extends Migration
{
    public function up()
    {
        $this->createTable('quadroHorarios',[
            'id' => $this->primaryKey(),
            'filme_id' => $this->integer(),
            'sala_id' => $this->integer(),
            'data_exibicao' => $this->date(),
            'dia_semana' => $this->string(3),
            'horario' => $this->time(),
            'flag3D' => $this->boolean(),
            'flagXD' => $this->boolean(),
            'idioma' => $this->string(3)
        ]);
        $this->addForeignKey('fk-filmerelquadro-filme_id','quadroHorarios','filme_id','filmes','id','CASCADE');
        $this->addForeignKey('fk-salarelquadro-sala_id','quadroHorarios','sala_id','salas','id','CASCADE');
    }

    public function down()
    {
        $this->dropTable("atoresfilmes");
    }
}

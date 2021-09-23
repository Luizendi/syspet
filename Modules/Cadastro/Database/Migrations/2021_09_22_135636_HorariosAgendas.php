<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HorariosAgendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_horariosagendas', function (Blueprint $table) {
            $table->bigIncrements('cd_horario');
            $table->bigInteger('fk_itemagenda')->unsigned();
            $table->string('situacao', 1, ['V', 'A', 'C'])->default('V')->comment("Coluna que corresponde a situação do horário na agenda: V - Vago, A - Agendado, C - Cancelado");
            $table->date('data');
            $table->time('hora');
            $table->string('ativo', 1, ['S', 'N'])->default();
            $table->timestamps();

            $table->foreign('fk_itemagenda')->references('cd_itemagenda')->on('tbl_itensagendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_horariosagendas');
    }
}

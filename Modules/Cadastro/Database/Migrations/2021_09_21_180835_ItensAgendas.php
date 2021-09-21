<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ItensAgendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_itensagendas', function (Blueprint $table) {
            $table->bigIncrements('cd_itemagenda');
            $table->bigInteger('fk_agenda')->unsigned();
            $table->string('dom', 1, ['S', 'N'])->nullable();
            $table->string('seg', 1, ['S', 'N'])->nullable();
            $table->string('ter', 1, ['S', 'N'])->nullable();
            $table->string('qua', 1, ['S', 'N'])->nullable();
            $table->string('qui', 1, ['S', 'N'])->nullable();
            $table->string('sex', 1, ['S', 'N'])->nullable();
            $table->string('sab', 1, ['S', 'N'])->nullable();
            $table->time('hora_inicio');
            $table->time('hora_termino');
            $table->time('tempo_consulta');
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_agenda')->references('cd_agenda')->on('tbl_agendas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_itensagendas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Agendamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_agendamentos', function (Blueprint $table) {
            $table->bigIncrements('cd_agendamento');
            $table->bigInteger('fk_horario')->unsigned();
            $table->bigInteger('fk_animal')->unsigned();
            $table->bigInteger('fk_servico')->unsigned()->nullable();
            $table->string('nome', 2500)->nullable();
            $table->string('confirmado', 1, ['S', 'N', 'F'])->default('N')->nullable();
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_horario')->references('cd_horario')->on('tbl_horariosagendas');
            $table->foreign('fk_animal')->references('cd_animal')->on('tbl_animais');
            $table->foreign('fk_servico')->references('cd_servico')->on('tbl_servicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_agendamentos');
    }
}

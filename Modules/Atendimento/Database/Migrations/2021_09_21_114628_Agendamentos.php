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
            $table->bigInteger('fk_agenda')->unsigned();
            $table->bigInteger('fk_animal')->unsigned();
            $table->string('nome');
            $table->timestamp('data_hora');
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();
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

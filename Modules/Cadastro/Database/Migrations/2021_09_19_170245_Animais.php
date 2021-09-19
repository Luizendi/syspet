<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Animais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_animais', function (Blueprint $table) {
            $table->bigIncrements('cd_animal');
            $table->bigInteger('fk_cliente')->unsigned()->nullable();
            $table->bigInteger('fk_raca')->unsigned();
            $table->bigInteger('fk_porte')->unsigned();
            $table->string('sexo', 1)->nullable();
            $table->string('castrado', 1, ['S', 'N'])->nullable();
            $table->string('nome')->nullable();
            $table->string('pelagem')->nullable();
            $table->string('foto')->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('obito', 1, ['S', 'N'])->default('N');
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_cliente')->references('cd_cliente')->on('tbl_clientes');
            $table->foreign('fk_raca')->references('cd_raca')->on('tbl_racas');
            $table->foreign('fk_porte')->references('cd_porte')->on('tbl_portes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_animais');
    }
}

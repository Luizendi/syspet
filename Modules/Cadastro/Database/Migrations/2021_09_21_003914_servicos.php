<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Servicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_servicos', function (Blueprint $table) {
            $table->bigIncrements('cd_servico');
            $table->bigInteger('fk_sexo')->unsigned();
            $table->bigInteger('fk_porte')->unsigned();
            $table->string('nome');
            $table->float('valor');
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
        Schema::dropIfExists('tbl_servicos');
    }
}

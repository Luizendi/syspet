<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Leitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_leitos', function (Blueprint $table) {
            $table->bigIncrements('cd_leito');
            $table->bigInteger('fk_porte')->nullable()->unsigned();
            $table->string('nome');
            $table->string('situacao', 1, ['L', 'O', 'I'])->nullable()->default('L');
            $table->string('isolamento', 1, ['S', 'N'])->nullable()->default('N');
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

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
        Schema::dropIfExists('tbl_leitos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Embalagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_embalagens', function (Blueprint $table) {
            $table->bigIncrements('cd_embalagem');
            $table->string('nome');
            $table->string('sigla');
            $table->decimal('quantidade');
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
        Schema::dropIfExists('tbl_embalagens');
    }
}

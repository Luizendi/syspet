<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TiposAltas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tiposaltas', function (Blueprint $table) {
            $table->bigIncrements('cd_alta');
            $table->string('nome');
            $table->string('obito', 1, ['S', 'N'])->default('N');
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
        Schema::dropIfExists('tbl_tiposaltas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_compras', function (Blueprint $table) {
            $table->bigIncrements('cd_compra');
            $table->bigInteger('fk_fornecedor')->unsigned();
            $table->date('dtachegada');
            $table->float('valortotal');
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_fornecedor')->references('cd_fornecedor')->on('tbl_fornecedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_compras');
    }
}

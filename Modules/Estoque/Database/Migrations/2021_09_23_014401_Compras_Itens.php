<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ComprasItens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_comprasitens', function (Blueprint $table) {
            $table->bigIncrements('cd_compraitem');
            $table->bigInteger('fk_compra')->unsigned();
            /*$table->bigInteger('fk_produto')->unsigned();
              $table->bigInteger('fk_embalagem')->unsigned();*/
            $table->float('valoritem');
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_compra')->references('cd_compra')->on('tbl_compras');
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

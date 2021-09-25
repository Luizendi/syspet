<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutosServicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_produtosservicos', function (Blueprint $table) {
            $table->bigIncrements('cd_produtoservico');
            $table->bigInteger('fk_produto')->unsigned()->nullable();
            $table->bigInteger('fk_servico')->unsigned()->nullable();
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_produto')->references('cd_produto')->on('tbl_produtos');
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
        Schema::dropIfExists('tbl_produtosservicos');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProdutoEmbalagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_produtosembalagens', function (Blueprint $table) {
            $table->bigIncrements('cd_produtoembalagem');
            $table->bigInteger('fk_produto')->unsigned()->nullable();
            $table->bigInteger('fk_embalagem')->unsigned()->nullable();
            $table->string('ativo', 1, ['S', 'N'])->default('S');
            $table->timestamps();

            $table->foreign('fk_produto')->references('cd_produto')->on('tbl_produtos');
            $table->foreign('fk_embalagem')->references('cd_embalagem')->on('tbl_embalagens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_produtosembalagens');
    }
}

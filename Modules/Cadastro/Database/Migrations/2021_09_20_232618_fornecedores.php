<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fornecedores', function (Blueprint $table) {
            $table->bigIncrements('cd_fornecedor');
            $table->string('nome');
            $table->string('endereco');
            $table->string('cnpjcpf');
            $table->string('ierg');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
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
        Schema::dropIfExists('tbl_fornecedores');
    }
}

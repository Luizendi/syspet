<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Route;

Route::prefix('estoque')->group(function () {
    Route::get('/', 'EstoqueController@index')->name('Estoque.home');

    Route::prefix('compras')->group(function () {
        Route::get('/', 'ComprasController@index')->name('compras.index');

    });

    Route::prefix('movimentacao')->group(function () {
        Route::get('/', 'MovimentacaoController@index')->name('movimentacao.index');

    });
});
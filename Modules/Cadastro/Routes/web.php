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

Route::prefix('cadastro')->group(function () {
    Route::get('/', 'CadastroController@index');

    Route::prefix('pessoa')->group(function () {
        route::get('/ListaCliente', 'CadastroController@CadPessoa')->name('pessoa');
        route::get('/', 'CadastroController@indexPessoa')->name('clientes.index');
        Route::post('/CadCliente', 'CadastroController@storeCliente')->name('clientes.insert');
        Route::get('/Cliente/{cliente}', 'CadastroController@editCliente')->name('clientes.edit');
    });

    Route::prefix('especies')->group(function () {
        Route::get('/', 'EspeciesController@index')->name('especies.index');
        Route::get('/new', 'EspeciesController@create')->name('especies.new');
        Route::post('/new', 'EspeciesController@store')->name('especies.insert');
        Route::get('/edit/{especie}', 'EspeciesController@edit')->name('especies.edit');
    });
    
    Route::prefix('racas')->group(function () {
        Route::get('/', 'RacasController@index')->name('racas.index');
        Route::get('/new', 'RacasController@create')->name('racas.new');
        Route::post('/new', 'RacasController@store')->name('racas.insert');
        Route::get('/edit/{raca}', 'RacasController@edit')->name('racas.edit');
    });
});

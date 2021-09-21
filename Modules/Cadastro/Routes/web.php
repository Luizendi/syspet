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
    Route::get('/', 'CadastroController@index')->name('cadastro.home');

    Route::prefix('animais')->group(function () {
        Route::get('/', 'AnimaisController@index')->name('animais.index');
        Route::get('/new', 'AnimaisController@create')->name('animais.new');
        Route::post('/new', 'AnimaisController@store')->name('animais.insert');
        Route::get('/edit/{animal}', 'AnimaisController@edit')->name('animais.edit');
    });

    Route::prefix('clientes')->group(function () {
        Route::get('/', 'ClientesController@index')->name('clientes.index');
        Route::get('/new', 'ClientesController@create')->name('clientes.new');
        Route::post('/new', 'ClientesController@store')->name('clientes.insert');
        Route::get('/edit/{cliente}', 'ClientesController@edit')->name('clientes.edit');
    });

    Route::prefix('especies')->group(function () {
        Route::get('/', 'EspeciesController@index')->name('especies.index');
        Route::get('/new', 'EspeciesController@create')->name('especies.new');
        Route::post('/new', 'EspeciesController@store')->name('especies.insert');
        Route::get('/edit/{especie}', 'EspeciesController@edit')->name('especies.edit');
    });

    Route::prefix('leitos')->group(function () {
        Route::get('/', 'LeitosController@index')->name('leitos.index');
        Route::get('/new', 'LeitosController@create')->name('leitos.new');
        Route::post('/new', 'LeitosController@store')->name('leitos.insert');
        Route::get('/edit/{leito}', 'LeitosController@edit')->name('leitos.edit');
    });

    Route::prefix('racas')->group(function () {
        Route::get('/', 'RacasController@index')->name('racas.index');
        Route::get('/new', 'RacasController@create')->name('racas.new');
        Route::post('/new', 'RacasController@store')->name('racas.insert');
        Route::get('/edit/{raca}', 'RacasController@edit')->name('racas.edit');
    });

    Route::prefix('tipos-altas')->group(function () {
        Route::get('/', 'TiposAltasController@index')->name('tiposaltas.index');
        Route::get('/new', 'TiposAltasController@create')->name('tiposaltas.new');
        Route::post('/new', 'TiposAltasController@store')->name('tiposaltas.insert');
        Route::get('/edit/{tipoalta}', 'TiposAltasController@edit')->name('tiposaltas.edit');
    });

    Route::prefix('fornecedores')->group(function () {
        Route::get('/', 'FornecedoresController@index')->name('fornecedores.index');
        Route::get('/new', 'FornecedoresController@create')->name('fornecedores.new');
        Route::post('/new', 'FornecedoresController@store')->name('fornecedores.insert');
        Route::get('/edit/{fornecedor}', 'FornecedoresController@edit')->name('fornecedores.edit');
    });

    Route::prefix('servicos')->group(function () {
        Route::get('/', 'ServicosController@index')->name('servicos.index');
        Route::get('/new', 'ServicosController@create')->name('servicos.new');
        Route::post('/new', 'ServicosController@store')->name('servicos.insert');
        Route::get('/edit/{servico}', 'ServicosController@edit')->name('servicos.edit');
    });
});

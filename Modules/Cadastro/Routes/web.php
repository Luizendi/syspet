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

    Route::prefix('agendas')->group(function () {
        Route::get('/', 'AgendasController@index')->name('agendas.index');
        Route::get('/new', 'AgendasController@create')->name('agendas.new');
        Route::post('/new', 'AgendasController@store')->name('agendas.insert');
        Route::get('/edit/{agenda}', 'AgendasController@edit')->name('agendas.edit');

        Route::prefix('horarios')->group(function () {
            Route::post('/gerar', 'HorariosAgendasController@store')->name('horarios.insert');
        });
    });

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
        Route::put('/edit/{especie}', 'EspeciesController@update')->name('especies.update');
    });

    Route::prefix('leitos')->group(function () {
        Route::get('/', 'LeitosController@index')->name('leitos.index');
        Route::get('/new', 'LeitosController@create')->name('leitos.new');
        Route::post('/new', 'LeitosController@store')->name('leitos.insert');
        Route::get('/edit/{leito}', 'LeitosController@edit')->name('leitos.edit');
        Route::put('/edit/{leito}', 'LeitosController@update')->name('leitos.update');
    });

    Route::prefix('racas')->group(function () {
        Route::get('/', 'RacasController@index')->name('racas.index');
        Route::get('/new', 'RacasController@create')->name('racas.new');
        Route::post('/new', 'RacasController@store')->name('racas.insert');
        Route::get('/edit/{raca}', 'RacasController@edit')->name('racas.edit');
        Route::put('/edit/{raca}', 'RacasController@update')->name('racas.update');
    });

    Route::prefix('tipos-altas')->group(function () {
        Route::get('/', 'TiposAltasController@index')->name('tiposaltas.index');
        Route::get('/new', 'TiposAltasController@create')->name('tiposaltas.new');
        Route::post('/new', 'TiposAltasController@store')->name('tiposaltas.insert');
        Route::get('/edit/{tipoalta}', 'TiposAltasController@edit')->name('tiposaltas.edit');
        Route::put('/edit/{tipoalta}', 'TiposAltasController@update')->name('tiposaltas.update');
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

    Route::prefix('produtos')->group(function () {
        Route::get('/', 'ProdutosController@index')->name('produtos.index');
        Route::get('/new', 'ProdutosController@create')->name('produtos.new');
        Route::post('/new', 'ProdutosController@store')->name('produtos.insert');
        Route::get('/edit/{produto}', 'ProdutosController@edit')->name('produtos.edit');
    });
});

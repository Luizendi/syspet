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
        route::get('/cadpessoa', 'CadastroController@CadPessoa')->name('pessoa');
    });
    Route::prefix('especies')->group(function () {
        Route::get('/', 'EspeciesController@index')->name('especies.index');
        Route::get('/new', 'EspeciesController@create')->name('especies.new');
        Route::post('/new', 'EspeciesController@store')->name('especies.insert');
        Route::get('/edit/{especie}', 'EspeciesController@edit')->name('especies.edit');
    });
});

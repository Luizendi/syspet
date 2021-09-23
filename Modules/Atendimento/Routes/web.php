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

Route::prefix('atendimento')->group(function () {
    Route::get('/', 'AtendimentoController@index')->name('atendimento.home');

    Route::prefix('agendamentos')->group(function () {
        Route::get('/', 'AgendamentosController@index')->name('agendamentos.index');
        Route::get('/new/{horario}', 'AgendamentosController@create')->name('agendamentos.new');
        Route::post('/new', 'AgendamentosController@store')->name('agendamentos.insert');
        Route::get('/edit/{agendamento}', 'AgendamentosController@edit')->name('agendamentos.alter');
    });
});

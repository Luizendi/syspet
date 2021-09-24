<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/cadastro', function (Request $request) {
    return $request->user();
});

Route::prefix('clientes')->group(function () {
    Route::get('/{cliente}', 'ClientesController@retornaCliente')->name('api.clientes.unico');
});

Route::prefix('racas')->group(function () {
    Route::get('/{raca}', 'RacasController@retornaRaca')->name('api.racas.unico');
});

Route::prefix('animais')->group(function () {
    Route::get('/{animal}', 'AnimaisController@retornaAnimal')->name('api.animais.unico');
});
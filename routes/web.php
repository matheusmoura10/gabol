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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/inicio', 'HomeController@index')->name('home');
//==============================================================================
// ROTAS INDICACAO
//==============================================================================
Route::prefix('/inicio/indicacao')->group(function () {
	Route::get('mapa','admin\IndicacaoController@index_indicacao')->name('mapa_visualiza');
	Route::post('salva_indicacao','admin\IndicacaoController@store_indicacao')->name('salva_indicacao');
});
//===============================================================================
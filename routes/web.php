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
	Route::get('lista_indicacao','admin\IndicacaoController@index_lista_indicacao')->name('lista_indicacao');
	Route::get('ver_indicacao/{id_indicacao}/{tipo}','admin\IndicacaoController@ver_indicacao')->name('ver_indicacao');
	Route::get('ver_tramite/{id_indicacao}','admin\IndicacaoController@tramite_index')->name('ver_tramite');
	Route::post('salva_tramite','admin\IndicacaoController@store_tramite')->name('salva_tramite');
	Route::get('deleta_tramite/{id_tramite}/{id_indicacao}','admin\IndicacaoController@deleta_tramite')->name('deleta_tramite');
});
//===============================================================================
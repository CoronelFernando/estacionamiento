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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Pagina principal
//Route::get('/', 'PrincipalController@index');
Route::get('/', 'EstadisticasController@index');
Route::get('home', 'PrincipalController@index');
//Route::get('home', 'EstadisticasController@index');

//Pagina de estadisticas
Route::get('estadisticas', 'EstadisticasController@index');
Route::post('estadisticas/DesplegarCajones', 'CajonControlller@allCajones');
Route::post('estadisticas/numeroOcupados', 'EstadisticasController@desplegarNumeroOcupados');

//Graficas
Route::get('estadisticas/autosPorHora', 'EstadisticasController@autosPorHora');
Route::get('estadisticas/vaciosPorHora', 'EstadisticasController@vaciosPorHora');
Route::get('estadisticas/areaChart', 'EstadisticasController@areaChart');

Route::get('historial', 'HistorialController@index');
Route::post('historial/allHistorial', 'HistorialController@showHistorial');
Route::get('historial/list', 'HistorialController@list');

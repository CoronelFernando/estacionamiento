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
Route::get('/', 'PrincipalController@index');
Route::get('home', 'PrincipalController@index');
Route::get('home/cajones', 'PrincipalController@cajones');
Route::get('home/pieChart', 'PrincipalController@pieChart');
Route::post('home/reservado', 'PrincipalController@reservado');
Route::post('home/cajon', 'PrincipalController@cajon');
Route::post('home/GuardarReservado', 'ReservadoControlller@guardarReservado');
Route::get('home/horaActual', 'PrincipalController@obtenerHoraActual');

//Pagina de estadisticas
Route::get('estadisticas', 'EstadisticasController@index');
Route::post('estadisticas/DesplegarCajones', 'CajonControlller@allCajones');
Route::post('estadisticas/numeroOcupados', 'EstadisticasController@desplegarNumeroOcupados');
Route::get('estadisticas/estadisticasGrafica', 'EstadisticasController@estadisticasParaGrafica');
Route::get('estadisticas/estadisticasGraHor', 'EstadisticasController@estParaGraHor');

// Pagina de reservacion
Route::get('reservados', 'ReservadoControlller@index');
Route::get('reservados/list', 'ReservadoControlller@list');

//Graficas
Route::get('estadisticas/autosPorHora', 'EstadisticasController@autosPorHora');
Route::get('estadisticas/vaciosPorHora', 'EstadisticasController@vaciosPorHora');
Route::get('estadisticas/areaChart', 'EstadisticasController@areaChart');

Route::get('historial', 'HistorialController@index');
Route::post('historial/allHistorial', 'HistorialController@showHistorial');
Route::get('historial/list', 'HistorialController@list');

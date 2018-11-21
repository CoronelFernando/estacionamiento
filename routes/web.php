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
Route::get('/', 'PrincipalController@index');
Route::get('home', 'PrincipalController@index');

//Pagina de estadisticas
Route::get('estadisticas', 'EstadisticasController@index');
Route::post('estadisticas/DesplegarCajones', 'CajonControlller@allCajones');

//Graficas
Route::get('estadisticas/autosPorHora', 'EstadisticasController@autosPorHora');

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
    return view('auth.logar');
});

/*
 * CONSULTAS
 * */
Route::resource('consultas', 'ConsultaController');

Route::get('consultas/comfim/{id}','ConsultaController@comfirm');
Route::get('consultas/descomfim/{id}','ConsultaController@descomfirm');

Route::get('consultas/tentarplus/{id}','ConsultaController@tentarplus');
Route::get('consultas/tentarless/{id}','ConsultaController@tentarless');

Route::get('consultas/create/{id}','ConsultaController@creates');
Route::get('consultas/delete/{id}','ConsultaController@delete');
Route::post('consultas/search','ConsultaController@search');

Route::get('consultas/fila/{filter}','ConsultaController@fila')->name('consultas.fila');
Route::post('consultas/fila','ConsultaController@filafilter');


Route::resource('pacientes', 'PacienteController');

Route::get('paciente/busca', 'PacienteController@search')->name('pacientes.busca');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logar', 'Auth\LoginController@logando')->name('logar');
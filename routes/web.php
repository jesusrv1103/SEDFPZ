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
    return view('admin.home');
});


Route::get('expedientes', 'ExpedienteController@index')->name('admin.expedientes.index');
Route::get('descargar/contrato/{id}', 'ExpedienteController@descargarContrato')->name('admin.expedientes.contrato');

Route::get('descargar/instruccion/{id}', 'ExpedienteController@instruccionAlNotario')->name('admin.expedientes.instruccion');
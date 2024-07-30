<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\EstanciaController;
Route::resource('/estancias', 'App\Http\Controllers\EstanciaController');
Route::resource('/tipo_vehiculo', 'App\Http\Controllers\Tipo_VehiculoController');
Route::get('/', function () {
    return view('welcome');
});
Route::post('/guardarestancia','App\Http\Controllers\EstanciaController@guardarEstancia');
Route::post('/buscarestancia','App\Http\Controllers\EstanciaController@buscarEstancia');
Route::get('/buscar', function () {
    return view('buscarestancia');
});

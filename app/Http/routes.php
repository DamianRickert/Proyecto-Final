<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('gestion_producto/categoria','CategoriaController');
Route::resource('gestion_producto/articulo','ArticuloController');
Route::resource('gestion_cliente/cliente','ClienteController');
Route::resource('gestion_cliente/cuenta','CuentaController');
Route::resource('gestion_venta/venta','VentaController');

//Route::get('GeneraCuenta','Controllers/CuentaController@GeneraCuenta');
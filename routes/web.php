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

Route::get('/', 'ProductoController@index')->name('productos');
Route::post('guardar_producto','ProductoController@crearNuevoProducto')->name('guardar_producto');
Route::get('/ventas','VentaController@index')->name('ventas');
Route::get('/ofertas', 'OfertaController@index')->name('ofertas');
Route::post('/sugerencia', 'OfertaController@buscarSugerenciaDeProducto')->name('sugerencia');
Route::post('/guardar_oferta', 'OfertaController@guardarOferta')->name('guardar_oferta');


/*Producto*/

Route::get('/', 'ProductoController@index')->name('productos');
Route::get('producto/nueva_familia', 'ProductoController@familia')->name('nueva_familia');

<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/productos/{categoria}', 'ProductController@index')->name('product.index');

Route::get('/login/selectcustomer', 'Auth\CustomerController@selectCustomer')->name('select.customer');
Route::post('/login/setcustomer', 'Auth\CustomerController@setCustomer')->name('set.customer');

Route::get('/carrito', 'PedidoController@showCart')->name('cart');
Route::post('/app/pedido/agregar', 'PedidoController@addItem');
Route::post('/app/pedido/quitar', 'PedidoController@removeItem');
Route::post('/app/pedido/totales', 'PedidoController@getOrderTotals');
Route::post('/app/pedido/totalescategoria', 'PedidoController@getCategoryTotals');

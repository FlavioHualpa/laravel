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

Route::view('/password/changed', 'auth.passwords.reset-success');

Route::get('/paginas/{nombre}', "PaginaController@index");

Route::get('/carrito', 'PedidoController@showCart')->name('cart');
Route::post('/app/pedido/agregar', 'PedidoController@addItem');
Route::post('/app/pedido/quitar', 'PedidoController@removeItem');
Route::post('/app/pedido/totales', 'PedidoController@getOrderTotals');
Route::post('/app/pedido/totalescategoria', 'PedidoController@getCategoryTotals');
Route::post('/app/pedido/cerrar', 'PedidoController@closeOrder');
Route::post('/app/pedido/eliminar', 'PedidoController@deleteOrder');
Route::post('/app/pedido/clientetieneabierto', 'PedidoController@checkOpenOrder');
Route::post('/app/pedido/repetir', 'PedidoController@repeatOrder');
Route::post('/app/pedido/cambiarestado', 'PedidoController@changeOrderState');
Route::get('/pedido/enviado', 'PedidoController@showConfirmation');
Route::get('/pedido/historial', 'HistoryController@index')->name('order.history');

Route::post('/search/products', 'SearchController@search');

Route::get('/cambiar', function() {
   return new \App\Mail\CambiarContraseña(
      \App\User::find(276),
      "asñdfjñaskdjfñasjdfñlkasjdfkjkasdfj"
   );
});

//
// ADMINISTRACIÓN
//

Route::get('/gestion/inicio', 'AdminController@index')->name('admin.home');
Route::get('/gestion/pedidos', 'AdminController@manageOrders')->name('admin.orders');
Route::get('/gestion/imprimir/{pedido}', 'AdminController@printOrder')->name('admin.print');

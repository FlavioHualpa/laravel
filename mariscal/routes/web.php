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
Route::get('/gestion/modificar/{pedido}', 'AdminController@modifyOrder')->name('admin.modify');

Route::get('/gestion/cliente/crear', 'AdminController@createCustomer')->name('admin.customer.create');
Route::post('/gestion/cliente/crear/agregardomicilio', 'AdminController@createCustomerAddAddress')->name('admin.customer.addaddress');
Route::delete('/gestion/cliente/crear/quitardomicilio', 'AdminController@createCustomerRemoveAddress')->name('admin.customer.removeaddress');
Route::post('/gestion/cliente/crear/agregartransporte', 'AdminController@createCustomerAddCarrier')->name('admin.customer.addcarrier');
Route::delete('/gestion/cliente/crear/quitartransporte', 'AdminController@createCustomerRemoveCarrier')->name('admin.customer.removecarrier');
Route::post('/gestion/cliente/crear', 'AdminController@storeCustomer')->name('admin.customer.store');

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
   return redirect()->route('home');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/switch-company', 'HomeController@switch')->name('switch.company');


/*  ----------------------  */
/*  PRODUCTOS
/*  ----------------------  */

Route::get('/products', 'ProductController@home')->name('products.home');
Route::get('/products/search', 'ProductController@index')->name('products.search');
Route::get('/products/create', 'ProductController@create')->name('products.create');
Route::post('/products/store', 'ProductController@store')->name('products.store');
Route::get('/products/edit/{product}', 'ProductController@edit')->name('products.edit');
Route::patch('/products/update/{product}', 'ProductController@update')->name('products.update');
Route::get('/products/get-data', 'ProductController@get_data');


/*  ----------------------  */
/*  CLIENTES
/*  ----------------------  */

Route::get('/customers', 'CustomerController@home')->name('customers.home');
Route::get('/customers/search', 'CustomerController@index')->name('customers.search');
Route::get('/customers/create', 'CustomerController@create')->name('customers.create');
Route::post('/customers/store', 'CustomerController@store')->name('customers.store');
Route::get('/customers/edit/{customer}', 'CustomerController@edit')->name('customers.edit');
Route::patch('/customers/update/{customer}', 'CustomerController@update')->name('customers.update');


/*  ----------------------  */
/*  ADMINISTRADORES
/*  ----------------------  */

// 1. GENERALES
Route::get('/accounts', 'AccountController@index')->name('admin.home');
Route::get('/accounts/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/accounts/login', 'Admin\LoginController@login')->name('admin.login');

// 2. EMPRESAS
Route::get('/accounts/companies', 'CompanyController@index')->name('admin.companies.search');
Route::get('/accounts/companies/create', 'CompanyController@create')->name('admin.companies.create');
Route::post('/accounts/companies/store', 'CompanyController@store')->name('admin.companies.store');
Route::get('/accounts/companies/edit/{company}', 'CompanyController@edit')->name('admin.companies.edit');
Route::patch('/accounts/companies/update/{company}', 'CompanyController@update')->name('admin.companies.update');

// 3. USUARIOS
Route::get('/accounts/users', 'UserController@index')->name('admin.users.search');
Route::get('/accounts/users/create', 'UserController@create')->name('admin.users.create');
Route::post('/accounts/users/store', 'UserController@store')->name('admin.users.store');
Route::get('/accounts/users/edit/{user}', 'UserController@edit')->name('admin.users.edit');
Route::patch('/accounts/users/update/{user}', 'UserController@update')->name('admin.users.update');

// 4. CONDICIONES IMPOSITIVAS
Route::get('/accounts/conditions', 'ConditionsController@index')->name('admin.conditions.search');
Route::get('/accounts/conditions/create', 'ConditionsController@create')->name('admin.conditions.create');
Route::post('/accounts/conditions/store', 'ConditionsController@store')->name('admin.conditions.store');
Route::get('/accounts/conditions/edit/{condition}', 'ConditionsController@edit')->name('admin.conditions.edit');
Route::patch('/accounts/conditions/update/{condition}', 'ConditionsController@update')->name('admin.conditions.update');

// 5. PROVINCIAS
Route::get('/accounts/states', 'StateController@index')->name('admin.states.search');
Route::get('/accounts/states/create', 'StateController@create')->name('admin.states.create');
Route::post('/accounts/states/store', 'StateController@store')->name('admin.states.store');
Route::get('/accounts/states/edit/{state}', 'StateController@edit')->name('admin.states.edit');
Route::patch('/accounts/states/update/{state}', 'StateController@update')->name('admin.states.update');

// 6. TRANSPORTES
Route::get('/accounts/transports', 'TransportController@index')->name('admin.transports.search');
Route::get('/accounts/transports/create', 'TransportController@create')->name('admin.transports.create');
Route::post('/accounts/transports/store', 'TransportController@store')->name('admin.transports.store');
Route::get('/accounts/transports/edit/{transport}', 'TransportController@edit')->name('admin.transports.edit');
Route::patch('/accounts/transports/update/{transport}', 'TransportController@update')->name('admin.transports.update');


/*  ----------------------  */
/*  FACTURAS
/*  ----------------------  */

Route::get('/invoices/create', 'InvoiceController@create')->name('invoices.create');
Route::post('/invoices/store', 'InvoiceController@store')->name('invoices.store');
Route::get('/invoices/show/{invoice}', 'InvoiceController@show')->name('invoices.show');
Route::get('/invoice_types/get/{customer}', 'InvoiceTypeController@getList');
Route::get('/conditions/get-final-tax', 'CustomerController@getFinalTax');


/*  ----------------------  */
/*  BANCOS
/*  ----------------------  */

Route::get('/banks/home', 'BankController@home')->name('banks.home');
Route::get('/banks/search', 'BankController@index')->name('banks.search');
Route::get('/banks/create', 'BankController@create')->name('banks.create');
Route::post('/banks/store', 'BankController@store')->name('banks.store');
Route::get('/banks/edit/{bank}', 'BankController@edit')->name('banks.edit');
Route::patch('/banks/update/{bank}', 'BankController@update')->name('banks.update');


/*  ----------------------  */
/*  CUENTAS BANCARIAS
/*  ----------------------  */

Route::get('/bank-accounts/home', 'BankAccountController@home')->name('bank-accounts.home');
Route::get('/bank-accounts/search', 'BankAccountController@index')->name('bank-accounts.search');
Route::get('/bank-accounts/create', 'BankAccountController@create')->name('bank-accounts.create');
Route::post('/bank-accounts/store', 'BankAccountController@store')->name('bank-accounts.store');
Route::get('/bank-accounts/edit/{bank_account}', 'BankAccountController@edit')->name('bank-accounts.edit');
Route::patch('/bank-accounts/update/{bank_account}', 'BankAccountController@update')->name('bank-accounts.update');


/*  ----------------------  */
/*  LISTAS DE PRECIOS
/*  ----------------------  */

Route::get('/price-lists/home', 'PriceListController@home')->name('price-lists.home');
Route::get('/price-lists/search', 'PriceListController@index')->name('price-lists.search');
Route::get('/price-lists/create', 'PriceListController@create')->name('price-lists.create');
Route::post('/price-lists/store', 'PriceListController@store')->name('price-lists.store');
Route::get('/price-lists/edit/{priceList}', 'PriceListController@edit')->name('price-lists.edit');
Route::patch('/price-lists/update/{priceList}', 'PriceListController@update')->name('price-lists.update');

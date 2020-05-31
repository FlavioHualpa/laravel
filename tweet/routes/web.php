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

Route::get('/', function () {
   return redirect()->route('home');
});

Auth::routes();

Route::view('/responses', 'responses');
Route::get('/file/download', 'HomeController@downloadFile')->name('file.download');
Route::get('/file/view', 'HomeController@viewFile')->name('file.view');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/connections', 'HomeController@connections')->name('connections');
Route::post('/follow/{user:username}', 'HomeController@follow')->name('follow');
Route::post('/unfollow/{user:username}', 'HomeController@unfollow')->name('unfollow');
Route::post('/invite/{user:username}', 'HomeController@invite')->name('invite');
Route::get('/{user:username}', 'HomeController@following')->name('following');

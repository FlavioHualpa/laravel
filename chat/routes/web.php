<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\MessageController;

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

Route::middleware('auth')->group(function() {
   
   Route::get('/', [ ChannelController::class, 'index' ])
      ->name('home');
   
   Route::get('/chat', [ MessageController::class, 'index' ])
      ->name('chat');

   Route::post('/send', [ MessageController::class, 'sendMessage' ])
      ->name('send');

});

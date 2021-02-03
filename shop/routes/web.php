<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

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

Route::redirect('/', '/home');

Route::view('/home', 'home')
   ->middleware('verified')
   ->name('home');

Route::get('/user/profile', function() {
   return view('auth.user-profile', ['user' => auth()->user()]);
})->middleware('auth')
   ->name('user.profile');

Route::view('/user/password', 'auth.user-password')
   ->middleware('auth')
   ->name('user.password');

Route::get('cart/browse', [CartController::class, 'index'])
   ->middleware('verified')
   ->name('cart.browse');

Route::get('checkout', [PaymentController::class, 'index'])
   ->middleware('verified')
   ->name('checkout');

Route::post('process/payment', [PaymentController::class, 'store'])
   ->middleware('verified')
   ->name('process.payment');

Route::get('payment/approved', [PaymentController::class, 'approved'])
   ->name('payment.approved');

Route::get('payment/rejected', [PaymentController::class, 'rejected'])
   ->name('payment.rejected');

/*
Route::view('/user/profile', 'auth.user-profile', ['user' => auth()->user()])
   ->middleware('auth')
   ->name('user.profile');

Route::middleware('auth')->group(function() {

   Route::view('/email/verify', 'auth.verify-email')
      ->name('verification.notice');
   
   Route::post('/email/verification-notification', function(Request $request) {
      $request->user()->sendEmailVerificationNotification();
      return back()->with('sent-message', 'Te hemos reenviado el correo');
   })->middleware('throttle:6,1')
      ->name('verification.send');
});
*/
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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('hotel')->name('hotel.')->group(

  function() {

    Route::get('rooms', 'RoomTypeController@index')->name('rooms');

    Route::get('room/{id}', 'RoomTypeController@show')->name('room-detail');

    Route::get('restaurant', 'MenuController@index')->name('restaurant');

    Route::get('reservations', 'ReservationsController@index')->name('reservations');

    Route::get('about')->name('about');

    Route::get('contact')->name('contact');

    Route::get('blog')->name('blog');

  }

);

Route::prefix('hotel')->name('room.')->group(

  function() {

    Route::post('rooms/choose', 'ReservationsController@choose')->name('choose');

    Route::post('rooms/prepare', 'ReservationsController@prepare')->name('prepare');

    Route::get('rooms/book', 'ReservationsController@store')->name('book');

  }

);

Route::get('user/reservations', 'UserController@showReservations')->name('user.reservations');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invoice', function () {

  $user = App\User::find(2);

  $reserv = new App\Reservation;
  $reserv->check_in = Carbon\Carbon::create(2020, 1, 2);
  $reserv->check_out = Carbon\Carbon::create(2020, 1, 12);
  $reserv->passengers = 2;
  $reserv->nights = 10;
  $reserv->room_number = 505;
  $reserv->room_name = "Familiar";
  $reserv->room_view = "Al parque interno";
  $reserv->total_price = 3824;

  $invoice = new App\Invoice;
  $invoice->created_at = Carbon\Carbon::create(2019, 12, 26);

  $pdf = PDF::loadView('hotel.invoice', [
    'user' => $user,
    'reservation' => $reserv,
    'invoice' => $invoice ]);
  // ->save('pdf/hhl-invoice-' . $invoice->branch. '-' . $invoice->number . '.pdf');

  $pdfPath = public_path('pdf/hhl-invoice-' . $invoice->branch . '-' . $invoice->number . '.pdf');

  $message = new App\Mail\ReservationDetails($user, $reserv, $pdfPath);

  // Illuminate\Support\Facades\Mail::to($user->email)
  //   ->send($message);

  return $pdf->stream();

  return view('hotel.invoice', [
    'user' => $user,
    'reservation' => $reserv,
    'invoice' => $invoice
  ]);

});

Route::get('/array/test', 'HomeController@getArray')->name('array.test');
Route::post('/array/test', 'HomeController@showArray');

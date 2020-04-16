<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
   public function index()
   {
      $first_name = Str::words(auth()->user()->name, 1, '');
      $tweets = auth()->user()->timeline();
      
      return view('home', [
         'first_name' => $first_name,
         'tweets' => $tweets,
      ]);
   }

   public function following(User $user)
   {
      $tweets = $user->tweets;

      return view('following', [
         'user' => $user,
         'tweets' => $tweets,
      ]);
   }
}

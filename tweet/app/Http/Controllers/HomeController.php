<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\Invite;
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

   public function connections()
   {
      $user = auth()->user();
      $following = $user->follows;
      $followers = $user->followed_by;

      $merged = $following->pluck('id')
         ->merge($followers->pluck('id'))
         ->push($user->id);
      
      $unrelated = User::whereNotIn('id', $merged)->take(20)->get();

      return view('connections', [
         'user' => $user,
         'following' => $following,
         'followers' => $followers,
         'unrelated' => $unrelated,
      ]);
   }

   public function follow(User $user)
   {
      $current_user = auth()->user();

      $current_user->follows()->attach($user);

      return back();
   }

   public function unfollow(User $user)
   {
      $current_user = auth()->user();

      $current_user->follows()->detach($user);

      return back();
   }

   public function invite(User $user)
   {
      \Event::dispatch(
         new \App\Events\Invitation(
            $user,
            auth()->user()
         )
      );

      return redirect()->route('connections');
   }

   public function downloadFile()
   {
      return response()->download('files/Queraltó - Canción 2.pdf');
   }

   public function viewFile()
   {
      return response()->file('files/Queraltó - Canción 2.pdf');
   }
}

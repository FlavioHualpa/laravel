<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
      $user_id = auth()->id();
      $cookie_name = "user_" . $user_id . "_active_company";
      $active_company = Cookie::get($cookie_name);

      // ddd($active_company);

      if ($active_company)
      {
         session()->put([
            'active_company' => $active_company
         ]);
      }
      elseif (auth()->user()->account->companies->count())
      {
         $active_company = auth()->user()->account->companies->first();
         Cookie::make($cookie_name, $active_company, 60 * 24 * 7, "\\");
         // le damos a la cookie una semana de validez
         // y disponible en todo el sitio

         session()->put([
            'active_company' => $active_company
         ]);
      }
      else
      {
         session()->forget('active_company');
      }
      
      return view('home');
   }

   public function switch(Request $request)
   {
      $user_id = auth()->id();
      $company_index = $request->input('company-index');
      $cookie_name = "user_" . $user_id . "_active_company";
      $active_company = auth()->user()->account->companies[$company_index];

      Cookie::make($cookie_name, $active_company, 60 * 24 * 7, '\\');

      session()->put([
         'active_company' => $active_company,
      ]);

      return back();
   }
}

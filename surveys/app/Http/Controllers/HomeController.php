<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

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
      $questionnaires = Questionnaire::where('user_id', auth()->id())
         ->latest()
         ->get();
      
      return view('home', [
         'questionnaires' => $questionnaires
         ]);
      }
   }
   
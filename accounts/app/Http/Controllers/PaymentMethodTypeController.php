<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodTypeController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');
   }
}

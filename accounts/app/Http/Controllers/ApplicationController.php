<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function create()
   {
      $customers = Customer::orderedByName()->get();

      return view('applications.create')
               ->with([
                  'customers' => $customers,
               ]);
   }
}

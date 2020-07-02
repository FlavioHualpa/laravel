<?php

namespace App\Http\Controllers;

use App\MenuNiv3;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index($categoria)
   {
      $nivel3 = MenuNiv3::where('url', $categoria)->first();
      $customer = User::getCurrentCustomer();

      if ($nivel3)
      {
         $nivel3->load('publicSubitems');
         return view('productos', [
            'categoria' => $nivel3,
            'cliente' => $customer
         ]);
      }

      return abort(404);
   }
}

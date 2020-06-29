<?php

namespace App\Http\Controllers;

use App\MenuNiv3;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index($categoria)
   {
      $nivel3 = MenuNiv3::where('url', $categoria)->first();

      if ($nivel3)
      {
         $nivel3->load('publicSubitems');
         return view('productos', [
            'categoria' => $nivel3
         ]);
      }

      return abort(404);
   }
}

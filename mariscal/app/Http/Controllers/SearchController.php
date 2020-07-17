<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;

class SearchController extends Controller
{
   public function search(Request $request)
   {
      return Producto::selectRaw(
         'ucase(menu_niv3.nombre) AS categoria,
         ucase(productos.nombre) AS variedad,
         menu_niv3.orden, productos.orden, url')
         ->join('menu_niv3', 'id_niv3', 'menu_niv3.id')
         ->join('menu_niv2', 'id_niv2', 'menu_niv2.id')
         ->join('menu_niv1', 'id_niv1', 'menu_niv1.id')
         ->where('menu_niv3.nombre', 'like', "%$request->keyword%")
         ->orWhere('productos.nombre', 'like', "%$request->keyword%")
         ->orderByRaw('menu_niv1.orden, menu_niv2.orden, menu_niv3.orden, productos.orden')
         ->get();
   }
}

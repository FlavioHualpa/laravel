<?php

namespace App\Http\Controllers;

use App\LinkFooter;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
   public function index($page)
   {
      $footerLink = LinkFooter::where('url', $page)->first();

      if (! $footerLink)
         return redirect('/error/noexiste');

      return view('adicional', [
         'htmlContent' => $footerLink->contenido
      ]);
   }
}

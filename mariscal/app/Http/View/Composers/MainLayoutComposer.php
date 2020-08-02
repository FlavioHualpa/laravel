<?php

namespace App\Http\View\Composers;

use App\LinkFooter;
use App\MenuNiv1;
use Illuminate\View\View;

class MainLayoutComposer
{
   /**
   * Create a new profile composer.
   *
   * @return void
   */
   public function __construct()
   {
   }
   
   /**
   * Bind data to the view.
   *
   * @param  View  $view
   * @return void
   */
   public function compose(View $view)
   {
      $itemsNiv1 = MenuNiv1::where('privado', 0)
         ->when(! (auth()->check() && auth()->user()->esAdmin()),
         function ($query) {
            $query->where('solo_admin', '!=', 1);
         })
         ->orderBy('orden')
         ->with('publicSubitems.publicSubitems')
         ->withCount('subitems')
         ->get();

      $linksFooter = LinkFooter::orderBy('orden')->get();
      
      $view->with([
         'itemsNiv1' => $itemsNiv1,
         'linksFooter' => $linksFooter,
      ]);
   }
}

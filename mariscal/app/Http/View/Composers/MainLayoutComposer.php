<?php

namespace App\Http\View\Composers;

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
         ->orderBy('orden')
         ->with('publicSubitems.publicSubitems')
         ->get();
      
      $view->with('itemsNiv1', $itemsNiv1);
   }
}

<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class LocalFormat extends Facade
{
   public static function getFacadeAccessor()
   {
      return \App\Services\Formatter::class;
   }
}

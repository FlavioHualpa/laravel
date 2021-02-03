<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class Gender
{
   public static function forName($name)
   {
      Http::get(
         'https://gender-api.com/get?key='
         . env('GENDER_API_KEY')
         . "&name=$name"
      )
      ->json()['gender'];
   }
}

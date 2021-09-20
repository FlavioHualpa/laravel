<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class GenderApi
{
   public static function getGender($name)
   {
      $gender = Http::get(
         "https://gender-api.com/get?name=$name&key=" .
         config('apis.gender_api_key')
      )->json()["gender"];

      return $gender == 'female' ? 'F' :
         ($gender == 'male' ? 'M' :
         'O');
   }
}
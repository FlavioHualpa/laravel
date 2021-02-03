<?php

namespace App\Helpers;

class NumberFormatter
{
   public static function currency($value, $decimals = 2)
   {
      return '$ ' . self::double($value, $decimals);
   }

   public static function double($value, $decimals = 2)
   {
      return number_format($value ?? 0, $decimals, ',', '.');
   }
}

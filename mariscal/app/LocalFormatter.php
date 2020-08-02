<?php

namespace App;

class LocalFormatter
{
   public static function number($value, $decimals = 2)
   {
      return number_format($value, $decimals, ',', '.');
   }

   public static function currency($value)
   {
      return "$ " . self::number($value);
   }

   public static function roundUp($value)
   {
      return self::number($value, 0);
   }
}

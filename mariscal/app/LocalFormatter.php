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
      return number_format(ceil($value), 0, ',', '.');
   }

   public static function datetime($date)
   {
      return $date->format('d/m/Y h:i');
   }

   public static function date($date)
   {
      return $date->format('d/m/Y');
   }
}

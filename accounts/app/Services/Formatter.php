<?php

namespace App\Services;

class Formatter
{
   public function currency($value)
   {
      return '$ ' . $this->float($value);
   }

   public function float($value)
   {
      return number_format($value, 2, ',', '.');
   }

   public function date($date)
   {
      return $date->format('d-m-Y');
   }
}

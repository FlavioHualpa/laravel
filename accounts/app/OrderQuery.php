<?php

namespace App;

class OrderQuery
{
   public static function make($col)
   {
      $prev = request()->query('order') ?? $col;
      $dir = request()->query('dir');
      $dir = ($dir == 'asc' && $prev == $col) ? 'desc' : 'asc';

      return "?order=$col&dir=$dir";
   }

   public static function fromQueryString($validFields)
   {
      $order = $validFields[0];
      $dir = 'asc';

      if (request()->has('order'))
      {
         $key = request()->query('order');
         $order = array_search(
            $key,
            $validFields
         ) ? $key : $validFields[0];
      }

      if (request()->has('dir'))
      {
         $key = request()->query('dir');
         $dir = array_search(
            $key, [
               'asc', 'desc'
            ]) ? $key : 'asc';
      }

      return [ $order, $dir ];
   }
}
<?php

require_once __DIR__.'/MySql.php';

class DBSource
{
   private $dbSource;

   private function __construct() { }

   public static function get()
   {
      if (! isset($dbSource))
         $dbSource = new MySql();

      return $dbSource;
   }
}

<?php

abstract class Connection
{
   public static function get(string $host, string $port, string $dbName, string $user, string $password) : PDO
   {
      $cstring = 'mysql:host=' . $host . ';port=' . $port . ';dbname=' . $dbName;
      try {
         $pdo = new PDO($cstring, $user, $password);
         $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (Exception $e)
      {
         return null;
      }

      return $pdo;
   }
}

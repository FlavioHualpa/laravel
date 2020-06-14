<?php

class MySql
{
   private $pdo;

   public function __construct()
   {
      [ $dsn, $user, $pass ] = require 'dbparams.php';

      try
      {
         $this->pdo = new PDO($dsn, $user, $pass);
         $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }

   public function __get($name)
   {
      switch ($name)
      {
         case 'conn':
            return $this->pdo;
            break;
      }
   }
}

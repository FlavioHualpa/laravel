<?php

require_once 'MySql.php';

class Entity
{
   protected $dbSource;

   public function __construct(MySql $dbSource)
   {
      $this->dbSource = $dbSource;
   }

   public function __get($name)
   {
      return $this->$name ?? null;
   }

   public function __set($name, $value)
   {
      $this->$name = $value;
   }
}

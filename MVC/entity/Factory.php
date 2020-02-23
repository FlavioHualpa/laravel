<?php

require_once 'StorageInterface.php';
require_once 'DbStorage.php';
// require_once 'JsonStorage.php';

abstract class Factory
{
   private static $dbSource;
   private static $jsonSource;

   public static function getDataSource(string $type) : ?StorageInterface {
      switch ($type) {
         case 'db':
            $dataSource = new DbStorage();
            break;
         case 'json':
            $dataSource = new JsonStorage();
            break;
         default:
            $dataSource = null;
            break;
      }
      return $dataSource;
   }

   public static function singleton(string $type) : ?StorageInterface
   {
      switch ($type) {
         case 'db':
            if (! static::$dbSource) {
               static::$dbSource = new DbStorage;
               static::$dbSource->connect();
               $dataSource = static::$dbSource;
            }
            $dataSource = static::$dbSource;
            break;
         case 'json':
            if (! static::$jsonSource) {
               static::$jsonSource = new JsonStorage;
               $dataSource = static::$jsonSource;
            }
            $dataSource = static::$jsonSource;
            break;
         default:
            $dataSource = null;
            break;
      }
      return $dataSource;
   }
}

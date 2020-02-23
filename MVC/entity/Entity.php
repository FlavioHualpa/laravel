<?php

require_once 'DbStorage.php';
require_once 'Factory.php';
require_once 'Str.php';

class Entity
{
   protected $fields;
   protected $storage;

   protected function __construct() {
      $this->fields = [];
      $this->storage = new DBStorage;
      $this->storage->connect();
   }

   public function __get($name) {
      return isset($this->fields[$name]) ? $this->fields[$name] : null;
   }

   public function __set($name, $value) {
      if (isset($this->fields[$name])) {
         $this->fields[$name] = $value;
      }
      else {
         throw new Exception("El campo $name no pertenece a esta entidad", 1);
      }
   }

   public static function all() : array {
      $storage = Factory::singleton('db');
      if ($storage instanceof DbStorage) {
         $query = 'SELECT * FROM ' . Str::plural(strtolower(static::class));
         $storage->setQuery($query);
         $rows = $storage->select();
      }
      elseif ($storage instanceOf JsonStorage) {
         $rows = $storage->select();
      }
      else {
         $rows = [];
      }

      $result = static::createArray($rows);
      return $result;
   }

   public static function toFlatArray(array $entities) : array {
      $data = array_map(
         function ($element) {
            return $element->fields;
         },
         $entities
      );

      return $data;
   }

   protected static function createInstance(array $row) : self {
      $entity = new self;
      $entity->fields = $row;
      return $entity;
   }

   protected static function createArray(array $rows) : array {
      $entities = [];
      foreach ($rows as $row) {
         $entities[] = static::createInstance($row);
      }
      return $entities;
   }
}

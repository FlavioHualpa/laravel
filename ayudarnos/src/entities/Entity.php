<?php

require_once 'StorageInterface.php';
require_once 'DbStorage.php';

class Entity
{
   protected $fields;

   protected function __construct() {
      $this->fields = [];
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
         $entities[] = self::createInstance($row);
      }
      return $entities;
   }
}

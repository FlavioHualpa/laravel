<?php

require_once __DIR__ . '/DBSource.php';
require_once __DIR__ . '/Grammar.php';

class Entity
{
   /*===============================================*/
   /* CONSTANTES PARA LA FUNCIÓN makeColumnsList()
   /*===============================================*/
   private const LIST_INSERT_COLUMNS = 1;
   private const LIST_INSERT_VALUES = 2;
   private const LIST_UPDATE_ASSIGN = 3;

   protected $timestamps = true;

   public function __get($name)
   {
      if (isset($this->$name))
         return $this->$name;
      
      $methodName = $name . 'Attribute';
      if (method_exists(static::class, $methodName))
         return $this->$methodName();
      
      return null;
   }

   public function __set($name, $value)
   {
      $this->$name = $value;
   }

   public function loadData($fields)
   {
      foreach ($fields as $name => $value)
         $this->$name = $value;
   }

   public static function find($id, $idColumn = 'id')
   {
      $dbSource = DBSource::get();
      $tableName = (new static)->getTableName();

      try
      {
         $sql = "SELECT * FROM $tableName WHERE $idColumn = :id";
         $stmt = $dbSource->conn->prepare($sql);
         $stmt->bindParam('id', $id);
         $stmt->execute();
      }
      catch (Exception $e)
      {
         var_dump($e);
         exit();
      }

      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      if (empty($data))
         return null;
      
      $entity = new static;
      $entity->loadData($data);
      return $entity;
   }

   public function save()
   {
      $fields = $this->getFieldsNames();

      if ($this->timestamps)
      {
         if (! array_key_exists('created_at', $fields))
            $fields['created_at'] = date('Y/m/d H:i:s');

         if (! array_key_exists('updated_at', $fields))
            $fields['updated_at'] = date('Y/m/d H:i:s');
      }

      $dbSource = DBSource::get();
      $tableName = $this->getTableName();
      $sql = "INSERT INTO $tableName "
         . $this->makeColumnsList($fields, self::LIST_INSERT_COLUMNS)
         . " VALUES"
         . $this->makeColumnsList($fields, self::LIST_INSERT_VALUES);
      
      try
      {
         $stmt = $dbSource->conn->prepare($sql);

         foreach ($fields as $key => $value)
            $stmt->bindValue($key, $value);
         
         $stmt->execute();
      }
      catch (Exception $e)
      {
         var_dump($e);
         exit();
      }

      $this->id = intval($dbSource->conn->lastInsertId());
      return true;
   }

   public function update()
   {
      if (! isset($this->id) || $this->id == null)
         return false;
      
      $fields = $this->getFieldsNames();

      if ($this->timestamps)
         $fields['updated_at'] = date('Y/m/d H:i:s');

      $dbSource = DBSource::get();
      $tableName = $this->getTableName();
      $sql = "UPDATE $tableName SET "
         . $this->makeColumnsList($fields, self::LIST_UPDATE_ASSIGN)
         . " WHERE id = $this->id";
      
      try
      {
         $stmt = $dbSource->conn->prepare($sql);

         foreach ($fields as $key => $value)
            $stmt->bindValue($key, $value);
         
         $stmt->execute();
      }
      catch (Exception $e)
      {
         var_dump($e);
         exit();
      }

      return true;
   }

   public function delete()
   {
      if (! isset($this->id) || $this->id == null)
         return false;

      $dbSource = DBSource::get();
      $tableName = $this->getTableName();
      $sql = "DELETE FROM $tableName "
         . " WHERE id = $this->id";
      
      try
      {
         $stmt = $dbSource->conn->prepare($sql);
         $stmt->execute();
      }
      catch (Exception $e)
      {
         var_dump($e);
         exit();
      }

      return true;
   }

   protected function getTableName()
   {
      if (isset($this->tableName))
         return $this->tableName;
      
      return Grammar::classToTableName(get_class($this));
   }

   protected function getFieldsNames()
   {
      return array_filter(
         get_object_vars($this),
         function($key) { return $key != 'timestamps' && $key != 'tableName'; },
         ARRAY_FILTER_USE_KEY
      );
   }

   protected function makeColumnsList($fields, $type)
   {
      $list = $type == self::LIST_UPDATE_ASSIGN ? "" : "(";
      $needsComma = false;

      foreach ($fields as $key => $value)
      {
         if ($needsComma)
            $list .= ", ";
         
         switch ($type)
         {
            case self::LIST_INSERT_COLUMNS:
               $list .= $key;
            break;

            case self::LIST_INSERT_VALUES:
               $list .= ":$key";
            break;
            
            case self::LIST_UPDATE_ASSIGN:
               $list .= "$key = :$key";
            break;
         }
         
         $needsComma = true;
      }

      $list .= $type == self::LIST_UPDATE_ASSIGN ? "" : ")";
      return $list;
   }
}

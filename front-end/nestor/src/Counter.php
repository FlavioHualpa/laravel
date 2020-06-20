<?php

require_once 'Entity.php';

class Counter extends Entity
{
   public function find($id)
   {
      try
      {
         $sql = 'SELECT id, nombre, numero FROM counters WHERE id = :id';
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('id', $id, PDO::PARAM_INT);
         $stmt->execute();

         return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }

   public function increment($id)
   {
      try
      {
         $sql = 'UPDATE counters SET numero = numero + 1 WHERE id = :id';
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('id', $id, PDO::PARAM_INT);
         $stmt->execute();
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }
}

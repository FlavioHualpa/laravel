<?php

require_once 'MySql.php';
require_once 'Entity.php';

class File extends Entity
{
   public function find($id)
   {
      try
      {
         $sql = 'SELECT id, nombre_pdf FROM pdfs WHERE id = :id';
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('id', $id, PDO::PARAM_STR);
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
         $sql = 'UPDATE pdfs SET descargas = descargas + 1 WHERE id = :id';
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('id', $id, PDO::PARAM_STR);
         $stmt->execute();
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }
}

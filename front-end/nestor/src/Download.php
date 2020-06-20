<?php

require_once 'Entity.php';

class Download extends Entity
{
   public function save()
   {
      try
      {
         $sql = 'INSERT INTO descargas
            (ce_pdf, fecha, pais, ciudad, ip)
            VALUES (:pdf_id, :date, :country, :city, :ip)';
         
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('pdf_id', $this->pdf_id, PDO::PARAM_INT);
         $stmt->bindParam('date', $this->created_at, PDO::PARAM_STR);
         $stmt->bindParam('country', $this->country, PDO::PARAM_STR);
         $stmt->bindParam('city', $this->city, PDO::PARAM_STR);
         $stmt->bindParam('ip', $this->ip, PDO::PARAM_STR);
         $stmt->execute();
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }
}

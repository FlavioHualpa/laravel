<?php

require_once 'Entity.php';

class Visit extends Entity
{
   public function save()
   {
      try
      {
         $sql = 'INSERT INTO visits
            (ip, fecha, url)
            VALUES (:ip, :date, :url)';
         
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('ip', $this->ip, PDO::PARAM_STR);
         $stmt->bindParam('date', $this->created_at, PDO::PARAM_STR);
         $stmt->bindParam('url', $this->url, PDO::PARAM_STR);
         $stmt->execute();
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }

   public function last($ip)
   {
      try
      {
         $sql = 'SELECT id, ip, fecha
            FROM visits
            WHERE ip = :ip
            ORDER BY fecha DESC
            LIMIT 1';
         $stmt = $this->dbSource->conn->prepare($sql);
         $stmt->bindParam('ip', $ip, PDO::PARAM_STR);
         $stmt->execute();

         return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }
}

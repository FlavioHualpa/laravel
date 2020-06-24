<?php

require_once 'Entity.php';

class Totals extends Entity
{
   private $desdeUnaSemana;
   private $desdeUnMes;

   public function __construct()
   {
      $this->desdeUnaSemana = date(
         "Y/m/d",
         mktime(0, 0, 0, date("m"), date("d") - 7, date("Y"))
      );

      $this->desdeUnMes = date(
         "Y/m/d",
         mktime(0, 0, 0, date("m") - 1, date("d"), date("Y"))
      );
   }

   public function byTitle()
   {
      $sql = 'SELECT id, nombre_pdf, (SELECT COUNT(ce_pdf) AS cantidad FROM descargas WHERE descargas.ce_pdf = pdfs.id AND descargas.fecha >= :desdeUnaSemana) AS ultimos7dias, (SELECT COUNT(ce_pdf) AS cantidad FROM descargas WHERE descargas.ce_pdf = pdfs.id AND descargas.fecha >= :desdeUnMes) AS ultimos30dias, pdfs.descargas AS todas FROM pdfs ORDER BY nombre_pdf';

      $stmt = prepareAndExecute($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function byDownloads()
   {
      $sql = 'SELECT id, nombre_pdf, (SELECT COUNT(ce_pdf) AS cantidad FROM descargas WHERE descargas.ce_pdf = pdfs.id AND descargas.fecha >= :desdeUnaSemana) AS ultimos7dias, (SELECT COUNT(ce_pdf) AS cantidad FROM descargas WHERE descargas.ce_pdf = pdfs.id AND descargas.fecha >= :desdeUnMes) AS ultimos30dias, pdfs.descargas AS todas FROM pdfs ORDER BY todas DESC';

      $stmt = prepareAndExecute($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function byCountry()
   {
      $sql = 'SELECT pais, COUNT(pais) AS todas
               FROM descargas
               GROUP BY pais
               ORDER BY todas DESC';

      $stmt = prepareAndExecute($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   private function prepareAndExecute($sql)
   {
      try
      {
         $stmt = $this->dbSource->conn->prepare($sql);
         
         $stmt->bindParam(
            'desdeUnaSemana',
            $this->desdeUnaSemana,
            PDO::PARAM_STRING
         );

         $stmt->bindParam(
            'desdeUnMes',
            $this->desdeUnMes,
            PDO::PARAM_STRING
         );

         $stmt->execute();

         return $stmt;
      }
      catch (Exception $e)
      {
         header('location:/error/500.php');
         exit();
      }
   }
}
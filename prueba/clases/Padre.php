<?php

class Padre
{
   protected $nombre;
   protected $apellido;

   public function __construct()
   {
      $this->nombre = 'Juan';
      $this->apellido = 'Peirot';
   }

   public function getNombreCompleto() : string
   {
      return $this->nombre . ' ' . $this->apellido;
   }
}

class Hijo extends Padre
{
   public function getNombreCompleto() : string
   {
      return parent::getNombreCompleto() . ' junior';
   }

   public function getApellidoNombre() : string
   {
      return $this->apellido . ', ' . $this->nombre;
   }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Herencia</title>
      <style media="screen">
         body { font-size: 24px; }
      </style>
   </head>
   <body>
      <?php
         $hijo = new Hijo();
         echo $hijo->getNombreCompleto();
         echo '<br>';
         echo $hijo->getApellidoNombre();
         echo '<br>';
      ?>
   </body>
</html>

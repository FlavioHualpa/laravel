<?php

class Habilidad
{
   private $nombre;
   private $expertise; // debe ser un entero entre 0 y 5

   public function __construct(string $nombre, int $expertise) {
      $this->setNombre($nombre);
      $this->setExpertise($expertise);
   }

   public function getNombre() : string {
      return $this->nombre;
   }

   public function getExpertise() : int {
      return $this->expertise;
   }

   public function setNombre(string $nombre) {
      $this->nombre = $nombre;
   }

   public function setExpertise(int $expertise) {
      if ($expertise < 0) {
         $this->expertise = 0;
      } elseif ($expertise > 5) {
         $this->expertise = 5;
      } else {
         $this->expertise = $expertise;
      }
   }

   public function sabeHacer(string $nombre, int $expertise) {
      return stricmp($this->nombre, $nombre) && $expertise < $this->expertise;
   }
}

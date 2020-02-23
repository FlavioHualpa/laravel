<?php

require_once 'cliente.php';

class Persona extends Cliente {
   private $nombre;
   private $apellido;
   private $documento;
   private $nacimiento;

   public function __construct(string $nombre, string $apellido, int $documento, DateTime $nacimiento, string $email, string $pass) {
      parent::__construct($email, $pass);
      $this->setNombre($nombre);
      $this->setApellido($apellido);
      $this->setDocumento($documento);
      $this->setNacimiento($nacimiento);
   }

   public function setNombre(string $nombre){
      $this->nombre = $nombre;
   }

   public function getNombre() : string {
      return $this->nombre;
   }

   public function setApellido(string $apellido){
      $this->apellido = $apellido;
   }

   public function getApellido() : string {
      return $this->apellido;
   }

   public function setDocumento(int $documento){
      $this->documento = $documento;
   }

   public function getDocumento() : int {
      return $this->documento;
   }

   public function setNacimiento(DateTime $nacimiento){
      $this->nacimiento = $nacimiento;
   }

   public function getNacimiento() : DateTime {
      return $this->nacimiento;
   }
}

<?php

require_once 'cliente.php';

class Pyme extends Cliente {
   private $cuit;
   private $razonSocial;

   public function __construct(string $razonSocial, string $cuit, string $email, string $pass) {
      parent::__construct($email, $pass);
      $this->setRazonSocial($razonSocial);
      $this->setCuit($cuit);
   }

   public function getRazonSocial() : string {
      return $this->razonSocial;
   }

   public function setRazonSocial(string $razonSocial) {
      $this->razonSocial = $razonSocial;
   }

   public function getCuit() : string {
      return $this->cuit;
   }

   public function setCuit(string $cuit) {
      $this->cuit = $cuit;
   }
}

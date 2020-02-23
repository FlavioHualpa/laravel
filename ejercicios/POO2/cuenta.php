<?php

abstract class Cuenta {
   public const MEDIO_BANELCO = 1;
   public const MEDIO_RED_LINK = 2;
   public const MEDIO_CAJA = 3;

   protected $cbu;
   protected $balance;
   protected $fechaUltimoMov;
   private $horaDeBsAs;

   public function __construct(string $cbu) {
      $this->setCBU($cbu);
      $this->setBalance(0.0);
      $this->setFechaUltimoMov(null);
      $this->horaDeBsAs = new DateTimeZone('America/Argentina/Buenos_Aires');
   }

   public function getCBU() : string {
      return $this->cbu;
   }

   public function setCBU(string $cbu) {
      $cbu = str_replace([ ' ', '-', '/' ], '', $cbu);
      if (strlen($cbu) != 22) {
         throw new \Exception("El CBU debe contener 22 dígitos", 1);
      }
      $this->cbu = $cbu;
   }

   public function getBalance() : float {
      return $this->balance;
   }

   private function setBalance(float $importe) {
      $this->balance = $importe;
   }

   protected function changeBalance(float $importe) {
      if (abs($importe) <= 0.01) {
         throw new \Exception("El importe a debe ser mayor a 0.01", 1);
      }
      $importe = round($importe, 2);
      $this->balance += $importe;
      $this->fechaUltimoBalance = new DateTime(null, $this->horaDeBsAs);
   }

   public function getFechaUltimoMov() : ?DateTime {
      return $this->fechaUltimoBalance;
   }

   private function setFechaUltimoMov(?DateTime $fechaUltimoBalance) {
      $this->fechaUltimoBalance = $fechaUltimoBalance;
   }

   public abstract function debitar(float $importe, int $medio);

   public function acreditar(float $importe) {
      $this->changeBalance($importe);
   }
}

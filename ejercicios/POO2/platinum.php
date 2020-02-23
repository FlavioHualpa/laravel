<?php

require_once 'cuenta.php';

class CuentaPlatinum extends Cuenta
{
   public function __construct(string $cbu) {
      parent::__construct($cbu);
   }

   public function debitar(float $importe, int $medio) {
      if ($this->balance < 5000.0)
      {
         parent::changeBalance(-$importe * 1.05);
      }
      else {
         parent::changeBalance(-$importe);
      }
   }
}

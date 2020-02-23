<?php

require_once 'cuenta.php';

class CuentaBlack extends Cuenta
{
   public function __construct(string $cbu) {
      parent::__construct($cbu);
   }

   public function debitar(float $importe, int $medio) {
      parent::changeBalance(-$importe);
   }
}

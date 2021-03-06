<?php

require_once 'cuenta.php';

class CuentaClassic extends Cuenta
{
   public function __construct(string $cbu) {
      parent::__construct($cbu);
   }

   public function debitar(float $importe, int $medio) {
      switch ($medio)
      {
         case CUENTA::MEDIO_BANELCO:
         parent::changeBalance(-$importe * 1.05);
         break;

         case CUENTA::MEDIO_RED_LINK:
         parent::changeBalance(-$importe * 1.1);
         break;

         case CUENTA::MEDIO_CAJA:
         parent::changeBalance(-$importe);
         break;
      }
   }
}

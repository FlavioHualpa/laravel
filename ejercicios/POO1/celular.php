<?php

class Celular
{
   public const COSTO_POR_MINUTO = 10;

   private $marca;
   private $modelo;
   private $proveedor;
   private $numero;

   public function __construct(string $marca, string $modelo, string $proveedor, string $numero)
   {
      $this->setMarca($marca);
      $this->setModelo($modelo);
      $this->setProveedor($proveedor);
      $this->setNumero($numero);
   }

   public function getMarca() : string {
      return $this->marca;
   }

   public function getModelo() : string {
      return $this->modelo;
   }

   public function getProveedor() : string {
      return $this->proveedor;
   }

   public function getNumero() : string {
      return $this->numero;
   }

   public function setMarca(string $marca) {
      $this->marca = $marca;
   }

   public function setModelo(string $modelo) {
      $this->modelo = $modelo;
   }

   public function setProveedor(string $proveedor) {
      $this->proveedor = $proveedor;
   }

   public function setNumero(string $numero) {
      $this->numero = $numero;
   }
}

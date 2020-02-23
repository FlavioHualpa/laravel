<?php

//Defino variables privadas para la clase Cliente

abstract class Cliente {
   protected $email;
   protected $pass;

   //Creo una función constructora con sus parámetros necesarios

   public function __construct(string $email, string $pass) {
      $this->setEmail($email);
      $this->setPass($pass);
   }

   //Creo funciones públicas para setear el valor pasado como parámetro al ejecutar la función constructora, como valor de la propiedad del objeto instanciado

   public function setEmail(string $email){
      $this->email = $email;
   }

   public function getEmail() : string {
      return $this->email;
   }

   public function setPass(string $pass){
      $this->pass = $pass;
   }

   public function getPass() : string {
      return $this->pass;
   }
}

<?php

class Usuario
{
   private $id;
   private $nombre;
   private $email;
   private $password;
   private $celular;
   private $habilidades;

   public function __construct(string $nombre, string $email, string $password)
   {
      $this->setNombre($nombre);
      $this->setEmail($email);
      $this->setPassword($password);
      $this->setCelular(null);
      $this->habilidades = [];
   }

   public function getId() : ?int {
      return $this->id;
   }

   public function getNombre() : string {
      return $this->nombre;
   }

   public function getEmail() : string {
      return $this->email;
   }

   public function getPassword() : string {
      return $this->password;
   }

   public function getCelular() : ?Celular {
      return $this->celular;
   }

   public function getHabilidades() : array {
      return $this->habilidades;
   }

   public function setId(int $id) {
      $this->id = $id;
   }

   public function setNombre(string $nombre) {
      $this->nombre = $nombre;
   }

   public function setEmail(string $email) {
      $this->email = $email;
   }

   public function setPassword(string $password) {
      $this->password = $this->encriptarPass($password);
   }

   private function encriptarPass(string $password) : string {
      return password_hash($password, PASSWORD_DEFAULT);
   }

   public function setCelular(?Celular $celular) {
      $this->celular = $celular;
   }

   public function agregarHabilidad(string $nombre, int $expertise) {
      $this->habilidades[] = new Habilidad($nombre, $expertise);
   }

   public function saludar() : string
   {
      return 'Hola, soy ' . $this->nombre;
   }

   public function mostrarCelular() : string
   {
      $mensaje = 'Mi celular es un ' . $this->celular->getMarca() . ' ' . $this->celular->getModelo();
      if ($this->celular->getMarca() == 'Apple') {
         $mensaje .= ' (y soy fan de los iPhones)';
      }
      return $mensaje;
   }

   public function llamar(Usuario $usuario, int $segundos) : float {
      $miCelular = $this->celular;
      $elOtroCelular = $usuario->celular;
      if ($miCelular && $elOtroCelular) {
         if ($miCelular->getProveedor() == $elOtroCelular->getProveedor()) {
            return 0.0;
         }
         return $segundos * Celular::COSTO_POR_MINUTO / 60.0;
      }
      return 0.0;
   }

   public function sabeHacer(string $nombre, int $expertise) {
      foreach ($this->habilidades as $habilidad) {
         if ($habilidad->sabeHacer($nombre, $expertise)) {
            return true;
         }
      }

      return false;
   }

   public function actualizar(Usuario $otro) {
      $this->setNombre($otro->getNombre());
      $this->setEmail($otro->getEmail());
      $this->setPassword($otro->getPassword());
      $this->setCelular($otro->getCelular());
      $this->habilidades = $otro->getHabilidades();
   }

   public function guardar() {
      Usuarios::agregarUsuario($this);
   }
}

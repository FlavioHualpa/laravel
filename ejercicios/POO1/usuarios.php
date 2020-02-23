<?php

require_once 'usuario.php';

class Usuarios
{
   private static $almacen = [];

   public static function agregarUsuario(Usuario $usuario) {
      $id = $usuario->getId();
      if ($id) {
         $almacenado = self::buscarUsuario($id);
         if ($almacenado) {
            $almacenado->actualizar($usuario);
         }
      }
      else {
         $id = self::buscarUltimoId();
         $usuario->setId($id + 1);
         self::$almacen[] = $usuario;
      }
   }

   private static function buscarUsuario(int $id) : Usuario {
      foreach (self::$almacen as $usuario) {
         if ($usuario->getId() == $id) {
            return $usuario;
         }
      }

      return null;
   }

   private static function buscarUltimoId() {
      $elementos = count(self::$almacen);
      if ($elementos == 0) {
         return 0;
      }

      return self::$almacen[$elementos - 1]->getId();
   }

   public static function logStorage() {
      var_dump(self::$almacen);
   }
}

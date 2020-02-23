<?php

   function cargar_usuarios() {
      if (file_exists('registrados.json')) {
         $json = file_get_contents('registrados.json');
         $usuarios = json_decode($json, true);
         return $usuarios;
      } else {
         return [];
      }
   }

   function guardar_usuario($usuario) {
      $usuarios = cargar_usuarios();
      $ultimo_usuario = $usuarios[count($usuarios) - 1];
      $nuevo_id = $ultimo_usuario['id'] + 1;
      $usuario['id'] = $nuevo_id;
      $usuarios[] = $usuario;
      $json = json_encode($usuarios);
      file_put_contents('registrados.json', $json);
   }

   function traer_usuario($id) {
      $usuarios = cargar_usuarios();

      foreach ($usuarios as $usuario) {
         if ($usuario['id'] == $id) {
            return $usuario;
         }
      }
      
      return null;
   }

?>
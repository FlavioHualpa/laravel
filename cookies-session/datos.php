<?php

function leer_json($ruta) {

   $array = null;

   if (file_exists($ruta)) {
      $txt = file_get_contents($ruta);
      $array = json_decode($txt, true);
   }

   return $array;

}

function guardar_json($ruta, $array) {

   $txt = json_encode($array);
   $ok = file_put_contents($ruta, $txt);
   return $ok;

}

function traer_usuario($email, $pass) {

   $usuarios = leer_json('datos/usuarios.json');
   if ($usuarios) {
      foreach ($usuarios as $usuario) {
         if ($usuario['email'] == $email && password_verify($pass, $usuario['contraseña'])) {
            return $usuario;
         }
      }
   }

   return null;
}

function traer_usuario_por_id($id) {

   $usuarios = leer_json('datos/usuarios.json');
   if ($usuarios) {
      foreach ($usuarios as $usuario) {
         if ($usuario['id'] == $id) {
            return $usuario;
         }
      }
   }

   return null;
}

function existe_usuario($email) {

   $usuarios = leer_json('datos/usuarios.json');
   if ($usuarios) {
      foreach ($usuarios as $usuario) {
         if ($usuario['email'] == $email) {
            return true;
         }
      }
   }

   return false;
}

function guardar_usuario($datos) {
   
   $usuarios = leer_json('datos/usuarios.json');

   if ($usuarios) {
      $id = $usuarios[count($usuarios) - 1]['id'] + 1;
   } else {
      $usuarios = [];
      $id = 1;
   }

   $usuario = [
      'id' => $id,
      'nombre' => $datos['nombre'],
      'apellido' => $datos['apellido'],
      'email' => $datos['email'],
      'contraseña' => password_hash($datos['contraseña'], PASSWORD_DEFAULT),
      'pais' => $datos['pais'],
   ];

   $usuarios[] = $usuario;
   guardar_json('datos/usuarios.json', $usuarios);

}

function contraseña_insegura($pwd) {

   $long = strlen($pwd);

   return ($long < 6 || $long > 12 || (strpbrk($pwd, 'abcdefghijklmnopqrstuvwxyz') == false) || (strpbrk($pwd, '0123456789') == false));

}

function array_test($array, $valor) {
   foreach ($array as $elem) {
      if ($elem != $valor) {
         return false;
      }
   }

   return true;
}

function crear_sesion($usuario) {

   $_SESSION['id-usuario'] = $usuario['id'];
   $_SESSION['nombre'] = $usuario['nombre'];
   $_SESSION['apellido'] = $usuario['apellido'];
   $_SESSION['email'] = $usuario['email'];

}

?>
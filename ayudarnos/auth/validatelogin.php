<?php

require_once __DIR__.'/../src/auth/Auth.php';

if (Auth::userLogged()) {
   header('location: ../index.php');
   exit;
}

if ($_POST) {
   require_once __DIR__.'/../src/validation/FormValidation.php';
   require_once __DIR__.'/../src/validation/StringFormField.php';
   require_once __DIR__.'/../src/validation/EmailFormField.php';
   require_once __DIR__.'/../src/validation/FileFormField.php';
   require_once __DIR__.'/../src/validation/ConfirmFormField.php';
   require_once __DIR__.'/../src/entities/FileUpload.php';
   require_once __DIR__.'/../src/entities/Factory.php';
   require_once __DIR__.'/../src/entities/User.php';

   $val = new FormValidation();
   
   $val->agregarValidacion(
      new EmailFormField(
         'email',
         true
      )
   );
   
   $val->agregarValidacion(
      new StringFormField(
         'password',
         true,
         6,
         50
      )
   );

   $datos = $_POST;
   $val->validar($datos);

   if ($val->sinErrores()) {
      $db = Factory::getDataSource('db');
      $db->connect();
      $user = User::select($db, $datos['email']);

      if ($user) {

         if (password_verify($datos['password'], $user->password)) {

            Auth::loginUser(
               [
                  'id' => $user->id,
                  'first-name' => $user->first_name,
                  'email' => $user->email,
               ]
            );
            
            header('location: ../index.php');
            exit;
         }

         $errores = [ 'password' => 'La contraseña ingresada no es correcta' ];
      }
      else {
         $errores = [ 'email' => 'El usuario no está registrado' ];
      }
   }
   else {
      $errores = $val->getErrores();
   }
}

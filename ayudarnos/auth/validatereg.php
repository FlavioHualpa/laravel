<?php

require_once __DIR__.'/../src/auth/Auth.php';

if (Auth::userLogged()) {
   header('location: ../index.php');
   exit;
}

if ($_POST) {
   require __DIR__.'/../src/validation/FormValidation.php';
   require __DIR__.'/../src/validation/StringFormField.php';
   require __DIR__.'/../src/validation/EmailFormField.php';
   require __DIR__.'/../src/validation/FileFormField.php';
   require __DIR__.'/../src/validation/ConfirmFormField.php';
   require __DIR__.'/../src/entities/FileUpload.php';
   require __DIR__.'/../src/entities/Factory.php';
   require __DIR__.'/../src/entities/User.php';

   $val = new FormValidation();
   
   $val->agregarValidacion(
      new StringFormField(
         'first_name',
         true,
         2,
         50
      )
   );
   
   $val->agregarValidacion(
      new StringFormField(
         'last_name',
         true,
         2,
         50
      )
   );
   
   $val->agregarValidacion(
      new EmailFormField(
         'email',
         true
      )
   );
   
   $val->agregarValidacion(
      new FileFormField(
         'avatar',
         false,
         [ 'jpg', 'jpeg', 'png', 'bmp' ]
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
   
   $val->agregarValidacion(
      new ConfirmFormField(
         'confirm',
         true,
         'password'
      )
   );

   $datos = $_POST;
   $datos['avatar'] = FileUpload::getFile('avatar');

   $val->validar($datos);

   if ($val->sinErrores()) {
      $datos['avatar'] = FileUpload::getUploadedName('avatar');
      $db = Factory::getDataSource('db');
      $db->connect();
      $user = User::insert(
         $db,
         [
            'first_name' => $datos['first_name'],
            'last_name' => $datos['last_name'],
            'email' => $datos['email'],
            'avatar_url' => $datos['avatar'],
            'password' => password_hash($datos['password'], PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s')
         ]
      );
      //var_dump($db->getErrorInfo(), $db, $user, $datos);
      //exit;

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
   else {
      $errores = $val->getErrores();
   }
}

<?php

require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/PasswordReset.php';
require_once __DIR__ . '/oldValues.php';

session_start();

if (isset($_SESSION['logged-in-user']))
{
   header('location:home.php');
   exit;
}

if ($_SERVER['REQUEST_METHOD'] != 'POST')
   return;

/*===============*/
/* VALIDACION
/*===============*/

$errors = [];
$input = $_POST;

$value = trim($input['email']);
if (empty($value))
{
   $errors['email'] = 'Por favor ingresá tu email';
}
elseif (! filter_var($value, FILTER_VALIDATE_EMAIL))
{
   $errors['email'] = 'El email que ingresaste no es válido';
}
else
{
   $user = User::find($value, 'email');
   if (empty($user))
   {
      $errors['email'] = 'No tenemos un usuario registrado con ese email';
   }
}

if (count($errors))
   return;
   
/*=============================================*/
/* ENVIAR EL LINK PARA CAMBIAR LA CONTRASEÑA
/*=============================================*/

$token = md5(random_bytes(60));

if ($reset = PasswordReset::find($user->email, 'email'))
{
   $reset->token = password_hash($token, PASSWORD_BCRYPT);
   $reset->created_at = date('Y/m/d H:i:s');
   $reset->update();
}
else
{
   $reset = new PasswordReset;
   $reset->email = $user->email;
   $reset->token = password_hash($token, PASSWORD_BCRYPT);
   $reset->created_at = date('Y/m/d H:i:s');
   $reset->save();
}

$linkReady = true;

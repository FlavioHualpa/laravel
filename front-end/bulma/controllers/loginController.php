<?php

require_once __DIR__ . '/../src/User.php';
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

$value = trim($input['password']);
if (empty($value)) {
   $errors['password'] = 'Por favor ingresá tu contraseña';
}
elseif ($user)
{
   if (! password_verify($value, $user->password))
   {
      $errors['password'] = 'La constraseña que ingresaste es incorrecta';
   }
}

if (count($errors))
   return;
   
/*===================================*/
/* CARGAR AL USUARIO EN LA SESIÓN
/*===================================*/

$_SESSION['logged-in-user'] = $user;
header('location:home.php');
exit;

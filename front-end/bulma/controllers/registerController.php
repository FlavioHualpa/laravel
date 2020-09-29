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

$nombre = trim($input['nombre']);
if (empty($nombre))
{
   $errors['nombre'] = 'Por favor ingresá tu nombre';
}

$apellido = trim($input['apellido']);
if (empty($apellido))
{
   $errors['apellido'] = 'Por favor ingresá tu apellido';
}

$email = trim($input['email']);
if (empty($email))
{
   $errors['email'] = 'Por favor ingresá tu email';
}
elseif (! filter_var($email, FILTER_VALIDATE_EMAIL))
{
   $errors['email'] = 'El email que ingresaste no es válido';
}
else
{
   $user = User::find($email, 'email');
   if ($user)
   {
      $errors['email'] = 'Ya tenemos un usuario registrado con ese email';
   }
}

$pass = trim($input['password']);
if (empty($pass))
{
   $errors['password'] = 'Por favor ingresá tu contraseña';
}

$confirm = trim($input['password_confirm']);
if (empty($confirm))
{
    $errors['password_confirm'] = 'Por favor confirmá tu contraseña';
}
elseif ($pass != $confirm)
{
   $errors['password_confirm'] = 'La contraseña y su confirmación son distintas';
}

if (count($errors))
   return;
   
/*=======================================*/
/* CREAR EL USUARIO EN LA BASE DE DATOS
/*=======================================*/

$user = new User;
$user->first_name = $nombre;
$user->last_name = $apellido;
$user->email = $email;
$user->password = password_hash($pass, PASSWORD_BCRYPT);
$user->save();

/*===================================*/
/* CARGAR AL USUARIO EN LA SESIÓN
/*===================================*/

$_SESSION['logged-in-user'] = $user;
header('location:home.php');
exit;

<?php

require_once __DIR__ . '/../src/User.php';
require_once __DIR__ . '/../src/PasswordReset.php';
require_once __DIR__ . '/oldValues.php';

session_start();

if (isset($_SESSION['logged-in-user']) || ! $_SESSION['reset-password-user-email'])
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

$pass = trim($input['password']);
if (empty($pass))
{
   $errors['password'] = 'Por favor ingresá la nueva contraseña';
}

$confirm = trim($input['password_confirm']);
if (empty($confirm))
{
   $errors['password_confirm'] = 'Por favor reingresá la contraseña';
}
elseif ($pass != $confirm)
{
   $errors['password_confirm'] = 'La contraseña y su confirmación son distintas';
}

if (count($errors))
   return;
   
/*====================================================*/
/* GUARDAR LA NUEVA CONTRASEÑA EN LA BD
/* Y QUITAR EL REGISTRO DE LA TABLA PASSWORD_RESETS
/*====================================================*/

$userEmail = $_SESSION['reset-password-user-email'];
$user = User::find($userEmail, 'email');
$user->password = password_hash($pass, PASSWORD_BCRYPT);
$user->update();

$reset = PasswordReset::find($userEmail, 'email');
$reset->delete();

unset($_SESSION['reset-password-user-email']);
header('location:passwordResetConfirmation.php');
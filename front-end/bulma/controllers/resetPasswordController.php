<?php

require_once __DIR__ . '/../src/PasswordReset.php';

session_start();

if (isset($_SESSION['logged-in-user']))
{
   header('location:home.php');
   exit;
}

/*=======================*/
/* VALIDACION DEL TOKEN
/*=======================*/

$input = $_GET;

$email = $input['email'] ?? null;
$token = $input['token'] ?? null;

$reset = PasswordReset::find($email, 'email');
if (empty($reset) || password_verify($token, $reset->token) == false)
{
   $errorMessage = 'Lo sentimos el enlace que usaste no es válido';
   return;
}

$elapsedMinutes = (time() - strtotime($reset->created_at)) / 60;
if ($elapsedMinutes > 60)
{
   $errorMessage = 'Lo sentimos el enlace para cambiar tu contraseña está vencido';
   return;
}

/*=============================*/
/* EL ENLACE ES VÁLIDO
/* REDIRIGIR A LA PÁGINA DEL
/* INGRESO DE LA CONTRASEÑA
/*=============================*/

$_SESSION['reset-password-user-email'] = $email;
header('location:newPassword.php');

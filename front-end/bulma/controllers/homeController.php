<?php

require_once __DIR__ . '/../src/User.php';

session_start();

$title = "Bienvenido a nuestro portal";

if (! isset($_SESSION['logged-in-user']))
{
   header('location:login.php');
   exit;
}

$user = $_SESSION['logged-in-user'];
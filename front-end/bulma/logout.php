<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST')
   return;

session_start();
session_destroy();

header('location:home.php');

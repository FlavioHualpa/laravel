<?php

session_start();
session_destroy();
setcookie('id-usuario', '', -1);
header('location: index.php');

?>
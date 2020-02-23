<?php

require_once __DIR__.'/../src/auth/Auth.php';

if (Auth::userLogged()) {
   Auth::logoutUser();
}

header('location: ../index.php');
exit;

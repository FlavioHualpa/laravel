<?php

/*
echo __DIR__;
echo '<br>';
echo dirname(__FILE__);
echo '<br>';
echo realpath('');
echo '<br>';
exit;
*/

require_once 'src/auth/Auth.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css" integrity="sha256-2bAj1LMT7CXUYUwuEnqqooPb1W0Sw0uKMsqNH0HwMa4=" crossorigin="anonymous" />
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/header.css">
   <title>Red Solidaria Ayudarnos</title>
</head>
<body>
   <header id="header">
      <div>
         <img src="img/logo.png" alt="Red Solidaria Ayudarnos">
         <p>Ayudar<b>NOS</b></p>
         <div id="userControls">
            <?php if ($user) : ?>
               <img src="<?= 'img/avatars/' . $user->avatar_url ?>" alt="<?= $user->first_name ?>" class="avatar">
               <span><?= $user->first_name ?></span>
               <a href="auth/logout.php" class="btn btn-secondary d-inline-block">cerrar sesión</a>
            <?php else : ?>
               <a href="auth/login.php" class="btn btn-secondary d-inline-block">iniciar sesión</a>
               <a href="auth/register.php" class="btn btn-main d-inline-block">registrarme</a>
            <?php endif ?>
         </div>
      </div>
   </header>

   <?php include 'compra.php' ?>
   <a href="<?= $preference->init_point ?>" style="margin-top: 150px; display: inline-block;" class="btn btn-main">Pagar con Mercado Pago</a>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js" integrity="sha256-7OUNnq6tbF4510dkZHCRccvQfRlV3lPpBTJEljINxao=" crossorigin="anonymous"></script>
   <script>
      // var elLink = document.querySelector('#info');
      // elLink.addEventListener(
      //    'click',
      //    function (event) {
      //       event.preventDefault();
      //       Swal.fire('Bravo! Tu primer modal box!', null, 'success');
      //    }
      // );
   </script>
</body>
</html>
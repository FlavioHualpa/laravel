<?php
require_once 'validatelogin.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Iniciar sesión</title>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/register.css">
</head>
<body>
   <div class="container">
      <div class="card">
         <div class="card-title">
            <h2>Iniciar sesión</h2>
         </div>
         <div class="card-body">
            <form action="" method="post">
               <div class="campo-form">
                  <label for="email">E-mail</label>
                  <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>">
                  <?php if (isset($errores['email'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['email'] ?></p>
                  <?php endif ?>
               </div>
               <div class="campo-form">
                  <label for="password">Contraseña</label>
                  <input type="password" name="password" id="password" value="<?= $_POST['password'] ?? '' ?>">
                  <?php if (isset($errores['password'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['password'] ?></p>
                  <?php endif ?>
               </div>
               <div class="campo-form">
                  <input type="submit" value="Iniciar sesión">
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
</html>

<?php
require_once 'validatereg.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Registro de usuario</title>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <link rel="stylesheet" href="../css/main.css">
   <link rel="stylesheet" href="../css/register.css">
</head>
<body>
   <div class="container">
      <div class="card">
         <div class="card-title">
            <h2>Registro de usuario</h2>
         </div>
         <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
               <div class="campo-form">
                  <label for="first_name">Nombre</label>
                  <input type="text" name="first_name" id="first_name" value="<?= $_POST['first_name'] ?? '' ?>">
                  <?php if (isset($errores['first_name'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['first_name'] ?></p>
                  <?php endif ?>
               </div>
               <div class="campo-form">
                  <label for="last_name">Apellido</label>
                  <input type="text" name="last_name" id="last_name" value="<?= $_POST['last_name'] ?? '' ?>">
                  <?php if (isset($errores['last_name'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['last_name'] ?></p>
                  <?php endif ?>
               </div>
               <div class="campo-form">
                  <label for="email">E-mail</label>
                  <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>">
                  <?php if (isset($errores['email'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['email'] ?></p>
                  <?php endif ?>
               </div>
               <div class="campo-form">
                  <label for="avatar">Foto del perfil</label>
                  <input type="file" name="avatar" id="avatar" value="<?= $_POST['avatar'] ?? '' ?>">
                  <?php if (isset($errores['avatar'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['avatar'] ?></p>
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
                  <label for="confirm">Confirme su contraseña</label>
                  <input type="password" name="confirm" id="confirm" value="<?= $_POST['confirm'] ?? '' ?>">
                  <?php if (isset($errores['confirm'])) : ?>
                  <p><i class="fas fa-exclamation-circle"></i><?= $errores['confirm'] ?></p>
                  <?php endif ?>
               </div>
               <div class="campo-form">
                  <input type="submit" value="Enviar">
               </div>
            </form>
         </div>
      </div>
   </div>
</body>
</html>
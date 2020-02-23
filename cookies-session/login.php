<?php

   session_start();
   require 'datos.php';

   $errores = [
      'email' => '',
      'pass' => '',
      'usuario' => '',
   ];

   if ($_POST) {

      if (empty(trim($_POST['email']))) {
         $errores['email'] = 'Por favor completá este campo';
      } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
         $errores['email'] = 'El email no es válido';
      }

      if (empty(trim($_POST['pass']))) {
         $errores['pass'] = 'Este campo es obligatorio';
      }

      if (empty($errores['email']) && empty($errores['pass'])) {
         $usuario = traer_usuario($_POST['email'], $_POST['pass']);
         if ($usuario) {
            crear_sesion($usuario);

            if (isset($_POST['recordar'])) {
               setcookie('id-usuario', $usuario['id'], time() + 60*60*8);
            }
            header('location: index.php');

         } else {
            $errores['usuario'] = 'No estás registrado como usuario<br>Ingresá tus datos en <a href="registro.php">esta página</a>';
         }
      }
   }

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Iniciar sesión</title>
   <link rel="stylesheet" href="css/login.css">
</head>
<body>
   <form action="login.php" method="post">
      <h2>Iniciar Sesión</h2>
      <div>
         <?php if (isset($errores['usuario'])) : ?>
            <p class="mensaje-error"><?= $errores['usuario'] ?></p>
         <?php endif ?>
      </div>
      <div>
         <label for="email">email</label>
         <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>">
         <p class="mensaje-error"><?= $errores['email'] ?></p>
      </div>
      <div>
         <label for="pass">contraseña</label>
         <input type="password" name="pass" id="pass">
         <p class="mensaje-error"><?= $errores['pass'] ?></p>
         <p><a href="">Olvidé</a> mi contraseña</p>
         <input type="checkbox" name="recordar" value="si" id="recordar" <?= isset($_POST['recordar']) ? 'checked' : '' ?>>
         <label for="recordar" class="display-inline">Recuérdame</label>
      </div>
      <div>
         <input type="submit" value="Ingresar">
      </div>
   </form>
</body>
</html>
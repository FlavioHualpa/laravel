<?php

   require 'datos.php';

   $errores = [
      'nombre' => '',
      'apellido' => '',
      'email' => '',
      'contraseña' => '',
      'confirmar' => '',
      'pais' => '',
      'existe' => '',
   ];

   $paises = [
      'ar' => 'Argentina',
      'bo' => 'Bolivia',
      'br' => 'Brasil',
      'ch' => 'Chile',
      'py' => 'Paraguay',
      'uy' => 'Uruguay',
   ];

   if ($_POST) {

      if (!isset($_POST['nombre']) || empty(trim($_POST['nombre']))) {
         $errores['nombre'] = 'Ingresá tu nombre';
      }

      if (!isset($_POST['apellido']) || empty(trim($_POST['apellido']))) {
         $errores['apellido'] = 'Ingresá tu apellido';
      }

      if (!isset($_POST['email']) || empty(trim($_POST['email']))) {
         $errores['email'] = 'Ingresá tu email';
      } elseif (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
         $errores['email'] = 'El email no es válido';
      }

      if (!isset($_POST['contraseña']) || empty(trim($_POST['contraseña']))) {
         $errores['contraseña'] = 'La contraseña es obligatoria';
      } elseif (contraseña_insegura($_POST['contraseña'])) {
         $errores['contraseña'] = 'La contraseña no es segura';
      }

      if (!isset($_POST['confirmar']) || empty(trim($_POST['confirmar']))) {
         $errores['confirmar'] = 'Por favor confirmá tu contraseña';
      } elseif ($_POST['confirmar'] != $_POST['contraseña']) {
         $errores['confirmar'] = 'La confirmación no coincide con la contraseña';
      }

      if (!isset($_POST['pais'])) {
         $errores['pais'] = 'Seleccioná un país';
      }

      if (array_test($errores, '')) {
         if (existe_usuario($_POST['email'])) {
            $errores['existe'] = 'Ya estás registrado<br>Iniciá sesión en <a href="login.php">esta página</a>';
         } else {
            guardar_usuario($_POST);
            header('location: login.php');
         }
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Registro de usuario</title>
   <link rel="stylesheet" href="css/login.css">
   <link rel="stylesheet" href="css/registro.css">
</head>
<body>
   <form action="registro.php" method="post">
      <h2>Ingresá tus datos</h2>
      <section>
         <p class="mensaje-error"><?= $errores['existe'] ?></p>
      </section>
      <div>
         <label for="nombre">nombre</label>
         <input type="text" name="nombre" id="nombre" value="<?= $_POST['nombre'] ?? '' ?>" class="<?= empty($errores['nombre']) ? '' : 'valor-invalido' ?>">
         <p class="mensaje-error"><?= $errores['nombre'] ?></p>
      </div>
      <div>
         <label for="apellido">apellido</label>
         <input type="text" name="apellido" id="apellido" value="<?= $_POST['apellido'] ?? '' ?>" class="<?= empty($errores['apellido']) ? '' : 'valor-invalido' ?>">
         <p class="mensaje-error"><?= $errores['apellido'] ?></p>
      </div>
      <div>
         <label for="email">email</label>
         <input type="text" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" class="<?= empty($errores['email']) ? '' : 'valor-invalido' ?>">
         <p class="mensaje-error"><?= $errores['email'] ?></p>
      </div>
      <div>
         <label for="contraseña">contraseña</label>
         <input type="password" name="contraseña" id="contraseña" value="" class="<?= empty($errores['contraseña']) ? '' : 'valor-invalido' ?>">
         <p class="mensaje-error"><?= $errores['contraseña'] ?></p>
      </div>
      <div>
         <label for="confirmar">confirmar contraseña</label>
         <input type="password" name="confirmar" id="confirmar" value="" class="<?= empty($errores['confirmar']) ? '' : 'valor-invalido' ?>">
         <p class="mensaje-error"><?= $errores['confirmar'] ?></p>
      </div>
      <div>
         <label for="pais">pais</label>
         <select name="pais" id="pais" class="<?= empty($errores['pais']) ? '' : 'valor-invalido' ?>">
         <?php foreach ($paises as $nom => $pais) : ?>
            <option
               value="<?= $nom ?>"
               <?= $nom == ($_POST['pais'] ?? '') ? 'selected' : '' ?>
            >
               <?= $pais ?>
            </option>
         <?php endforeach ?>
         </select>
         <p class="mensaje-error"><?= $errores['pais'] ?></p>
      </div>
      <div>
         <input type="submit" value="Enviar">
      </div>
   </form>
</body>
</html>
<?php

   $titulo = 'Perfil de usuario';
   $stylesheets = [
      'main.css',
      'perfil.css'
   ];

   require 'include/usuarios.php';
   $usuario = null;

   if ($_GET && isset($_GET['id'])) {
      $id = $_GET['id'];
      $usuario = traer_usuario($id);
   }

   function diferencia_de_años($fecha1, $fecha2) {
      $dif = strtotime($fecha1) - strtotime($fecha2);
      return floor($dif / (60*60*24*365));
   }
?>

<!DOCTYPE html>
<html lang="en">

<?php require 'include/head.php'; ?>

<body>
   <div class="container">
      <h2>Perfil de usuario</h2>

      <?php if ($usuario == null) : ?>

         <div class="columna-full">
            <img src="img/advertencia.png" alt="Usuario no registrado">
            <span>El usuario no está registrado.</span>
         </div>

      <?php else :
         $nombre_completo = $usuario['nombre'] . ' ' . $usuario['apellido'];
      ?>

      <div class="datos">
         <div class="columna-izq">
            <div style="<?= 'background-image: url(\'img/usuarios/' . $usuario['fotoDePerfil'] . '\');'?>">
            </div>
         </div>
         <div class="columna-der">
            <h3><?= $nombre_completo ?></h3>
            <p>email</p>
            <h3><?= $usuario['email'] ?></h3>
            <p>telefono</p>
            <h3><?= $usuario['telefono'] ?></h3>
            <p>fecha de nacimiento</p>
            <h3><?= $usuario['fechaDeNacimiento'] ?></h3>
            <p>edad</p>
            <h3><?= diferencia_de_años(date('Y-m-d'), $usuario['fechaDeNacimiento']) ?></h3>
         </div>
      </div>
      
      <?php endif ?>
      
      <a href="listado.php" class="btn-link">volver al listado</a>
   </div>
</body>
</html>
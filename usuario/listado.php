<?php

   $titulo = 'Listado de usuarios';
   $stylesheets = [
      'main.css',
      'listado.css'
   ];

   require 'include/usuarios.php';

   function listar_usuarios() {
      $usuarios = cargar_usuarios();

      foreach ($usuarios as $usuario) {
         $nombre = $usuario['nombre'] . ' ' . $usuario['apellido'];
         $query_string = '?id=' . $usuario['id'];
         echo '<li>';
         echo '<a href="perfil.php' . $query_string . '" alt="' . $nombre . '">';
         echo $nombre;
         echo '</a>';
         echo '</li>';
      }
   }
?>

<!DOCTYPE html>
<html lang="en">

<?php require 'include/head.php'; ?>

<body>
   <div class="container">
      <h2>Usuarios registrados</h2>
      <ul>
         <?php listar_usuarios(); ?>
      </ul>
      <a href="index.php" class="btn-link">nuevo usuario</a>
   </div>
</body>
</html>
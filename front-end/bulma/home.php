<?php

require_once 'controllers/homeController.php';

?>

<!DOCTYPE html>
<html lang="es">
<?php require 'layout/header.php'; ?>

<body>
   <div class="container">
      <h1 class="title">
         Hola <?= $user->fullName ?>!
      </h1>

      <form action="logout.php" method="post">
         <button class="button is-link is-small">
            Cerrar Sesión
         </button>
      </form>
   </div>
</body>
</html>

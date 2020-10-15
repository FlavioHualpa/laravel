<?php
require_once 'controllers/resetPasswordController.php';
$title =  'Solicitar cambio de contraseña';
?>

<!DOCTYPE html>
<html lang="es">
<?php require 'layout/header.php'; ?>

<body>
   <div class="columns">
      <div class="column is-4 is-offset-4">
         <div class="frame mt-6">
            <div class="block">
               <p class="subtitle">
                  <span class="icon is-left"> 
                     <i class="fas fa-exclamation-circle"></i>
                  </span>
                  <?= $errorMessage ?>
               </p>
            </div>

            <div class="field is-grouped is-grouped-centered mt-5">
               <div class="control">
                  <a href="requestResetLink.php" class="button is-primary">
                     Volver a solicitar un link
                  </a>
               </div>
               <div class="control">
                  <a href="home.php" class="button is-dark">
                     Ir a la página de inicio
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>

</body>
</html>

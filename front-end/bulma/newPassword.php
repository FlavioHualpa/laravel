<?php
require_once 'controllers/newPasswordController.php';
$title = 'Cambiá tu contraseña';
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
                  <span class="icon"> 
                     <i class="fas fa-exclamation-circle"></i>
                  </span>
                  Solicitaste el cambio de tu contraseña.
                  <br>
               </p>
               <p>
                  Por favor ingresala a continuación.
               </p>
            </div>

            <form method="post">
               <div class="field">
                  <label for="password" class="label is-small mb-1">
                     Nueva contraseña
                  </label>
                  <div class="control has-icons-left">
                     <input type="password" class="input is-fullwidth <?= isset($errors['password']) ? 'is-danger' : '' ?>" name="password" id="password" autofocus>
                     <span class="icon is-left">
                        <i class="fas fa-lock"></i>
                     </span>
                  </div>
                  <?php if (isset($errors['password'])) : ?>
                  <p class="help is-danger">
                     <?= $errors['password'] ?>
                  </p>
                  <?php endif ?>
               </div>

               <div class="field">
                  <label for="password_confirm" class="label is-small mb-1">
                     Reingresá la contraseña
                  </label>
                  <div class="control has-icons-left">
                     <input type="password" class="input is-fullwidth <?= isset($errors['password_confirm']) ? 'is-danger' : '' ?>" name="password_confirm" id="password_confirm">
                     <span class="icon is-left">
                        <i class="fas fa-lock"></i>
                     </span>
                  </div>
                  <?php if (isset($errors['password_confirm'])) : ?>
                  <p class="help is-danger">
                     <?= $errors['password_confirm'] ?>
                  </p>
                  <?php endif ?>
               </div>

               <div class="field mt-5">
                  <div class="control has-text-centered">
                     <button class="button is-primary">
                        Confirmar
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

</body>
</html>

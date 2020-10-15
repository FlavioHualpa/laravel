<?php
require_once 'controllers/resetLinkController.php';
$title =  'Solicitar cambio de contraseña';
?>

<!DOCTYPE html>
<html lang="es">
<?php require 'layout/header.php'; ?>

<body>
   <div class="columns">
      <div class="column is-4 is-offset-4">
         <div class="frame mt-6">
            <form method="post">
               <div class="block">
                  <p class="subtitle">
                     Olvidaste tu contraseña?
                  </p>
                  <p>
                     <span class="icon is-left"> 
                        <i class="far fa-lightbulb"></i>
                     </span>
                     No te preocupes, te podemos enviar un link al correo electrónico que usaste para crear tu usuario, para que puedas cambiar tu contraseña
                  </p>
               </div>

               <div class="field">
                  <label for="email" class="label is-small mb-1">
                     Correo Electrónico
                  </label>
                  <div class="control has-icons-left">
                     <input type="text" class="input is-fullwidth <?= isset($errors['email']) ? 'is-danger' : '' ?>" name="email" id="email" value="<?= old('email') ?>" autofocus>
                     <span class="icon is-left"> 
                        <i class="fas fa-envelope"></i>
                     </span>
                  </div>
                  <?php if (isset($errors['email'])) : ?>
                  <p class="help is-danger">
                     <?= $errors['email'] ?>
                  </p>
                  <?php endif ?>
               </div>

               <div class="field is-grouped is-grouped-centered mt-5">
                  <div class="control">
                     <button type="submit" class="button is-primary">
                        Enviar link
                     </button>
                  </div>
                  <div class="control">
                     <a href="home.php" class="button is-dark">
                        Cancelar
                     </a>
                  </div>
               </div>
            </form>

            <?php if (isset($linkReady)) : ?>
            <div class="block mt-5">
               <span class="icon is-left"> 
                  <i class="fas fa-link"></i>
               </span>
               Utilizá el siguiente enlace para cambiar tu contraseña
               <a href="resetPassword.php?email=<?=$user->email?>&token=<?=$token?>">
                  Cambiar mi contraseña
               </a>
            </div>
            <?php endif ?>
         </div>
      </div>
   </div>

</body>
</html>

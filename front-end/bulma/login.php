<?php
require_once 'controllers/loginController.php';
$title =  'Iniciar Sesión';
?>

<!DOCTYPE html>
<html lang="es">
<?php require 'layout/header.php'; ?>

<body>
   <div class="columns">
      <div class="column is-4 is-offset-4">
         <div class="frame mt-6">
            <div class="tabs is-fullwidth">
               <ul>
                  <li class="is-active">
                     <a>Iniciar Sesión</a>
                  </li>
                  <li>
                     <a href="register.php">Registrarse</a>
                  </li>
               </ul>
            </div>

            <form action="login.php" method="post">
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

               <div class="field">
                  <label for="password" class="label is-small mb-1">
                     Contraseña
                  </label>
                  <div class="control has-icons-left">
                     <input type="password" class="input is-fullwidth <?= isset($errors['password']) ? 'is-danger' : '' ?>" name="password" id="password">
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

               <div class="block">
                  <a href="resetPassword.php">
                     Olvidaste tu contraseña?
                  </a>
               </div>

               <div class="field mt-5">
                  <div class="control has-text-centered">
                     <button class="button is-primary">
                        Iniciar Sesión
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

</body>
</html>

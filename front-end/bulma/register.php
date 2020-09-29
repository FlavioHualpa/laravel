<?php
require_once 'controllers/registerController.php';
$title =  'Registro de usuarios';
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
                  <li>
                     <a href="login.php">Iniciar Sesión</a>
                  </li>
                  <li class="is-active">
                     <a>Registrarse</a>
                  </li>
               </ul>
            </div>

            <form action="register.php" method="post">
               <div class="columns">
                  <div class="column">
                     <div class="field">
                        <label for="nombre" class="label is-small mb-1">
                           Nombre
                        </label>
                        <div class="control has-icons-left">
                           <input type="text" class="input is-fullwidth <?= isset($errors['nombre']) ? 'is-danger' : '' ?>" name="nombre" id="nombre" value="<?= old('nombre') ?>" autofocus>
                           <span class="icon is-left"> 
                              <i class="fas fa-user"></i>
                           </span>
                           <?php if (isset($errors['nombre'])) : ?>
                           <p class="help is-danger">
                              <?= $errors['nombre'] ?>
                           </p>
                           <?php endif ?>
                        </div>
                     </div>
                  </div>
                  <div class="column">
                     <div class="field">
                        <label for="apellido" class="label is-small mb-1">
                           Apellido
                        </label>
                        <div class="control has-icons-left">
                           <input type="text" class="input is-fullwidth <?= isset($errors['apellido']) ? 'is-danger' : '' ?>" name="apellido" id="apellido" value="<?= old('apellido') ?>" autofocus>
                           <span class="icon is-left"> 
                              <i class="fas fa-user"></i>
                           </span>
                           <?php if (isset($errors['apellido'])) : ?>
                           <p class="help is-danger">
                              <?= $errors['apellido'] ?>
                           </p>
                           <?php endif ?>
                        </div>
                     </div>
                  </div>
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

               <div class="field">
                  <label for="password_confirm" class="label is-small mb-1">
                     Confirmá la contraseña
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
                        Registrarme
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>

</body>
</html>

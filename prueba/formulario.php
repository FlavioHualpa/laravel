<?php

   $nombre = '';
   $email = '';
   $nombre_ok = true;
   $email_ok = true;
   $error_nombre = '';
   $error_email = '';

   if ($_POST) {
      $nombre = $_POST['nombre'];
      $email = $_POST['email'];
      if (trim($nombre) == '') {
         $nombre_ok = false;
         $error_nombre = "Complete su nombre";
      }
      if (trim($email) == '') {
         $email_ok = false;
         $error_email = 'Complete su email';
      } else if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
         $email_ok = false;
         $error_email = 'El email no es válido';
      }

      $todo_ok = $nombre_ok && $email_ok;
      if ($todo_ok) {
         header('Location: imprimir.php');
         exit;
      }
   }

?>

<!DOCTYPE html>
<html>
   <body>
      <form action="imprimir.php" method="post" enctype="multipart/form-data">
         <label for="nombre">Nombre:</label>
         <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>">
         <?php if (!$nombre_ok) : ?>
            <span><?= $error_nombre ?></span>
         <?php endif ?>
         <br>
         <label for="email">E-mail:</label>
         <input type="text" name="email" id="email" value="<?= $email ?>">
         <?php if (!$email_ok) : ?>
            <span><?= $error_email ?></span>
         <?php endif ?>
         <br>
         <label for="archivo">Archivo:</label>
         <input type="file" name="archivo" id="archivo">
         <br>
         <input type="submit">
      </form>
   </body>
</html>

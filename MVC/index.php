<?php
require 'controllers/UsersIndex.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Usuarios</title>
</head>
<body>
  <h1>Listado de Usuarios</h1>

  <ul>
    <?php foreach ($users as $user) : ?>
      <li style="font-size: 20px">
        <?= $user->first_name . ' ' . $user->last_name . ' (' . $user->email . ')' ?>
      </li>
    <?php endforeach ?>
  </ul>

  <!-- <?php var_dump($users) ?> -->
</body>
</html>

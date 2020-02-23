<?php

   if (isset($_POST['action'])) {
      session_start();
      $action = $_POST['action'];
      if ($action == 'reset') {
         $_SESSION['contador'] = 0;
      } elseif ($action == 'inc' && isset($_SESSION['contador'])) {
         $_SESSION['contador']++;
      } elseif ($action == 'logout') {
         $_SESSION = [];
         session_destroy();
      }
      header('location: mostrar.php');
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <style> * { font-family: 'Segoe UI'; font-size: 36px; } </style>
</head>
<body>
   <form action="modificar.php" method="post">
      <input type="submit" name="action" value="reset">
      <button type="submit" name="action" value="inc">Incrementar</button>
      <input type="submit" name="action" value="logout">
   </form>
</body>
</html>
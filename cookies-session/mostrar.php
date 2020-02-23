<?php

   session_start();

   if (isset($_SESSION['contador'])) {
      $msj = 'El valor del contador es: ' . $_SESSION['contador'];
   } else {
      $msj = 'El contador no está inicializado.';
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Contador</title>
   <style> * { font-family: 'Segoe UI'; font-size: 36px; } </style>
</head>
<body>
   <p><?= $msj ?></p>
</body>
</html>
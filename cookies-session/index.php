<?php

   session_start();
   require 'datos.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Mi Portal</title>
   <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="css/index.css">
</head>
<body>
   <header>
      <nav>
         <div>
            <img src="img/logo.png" alt="logo">
         </div>
         <div>
            <ul>
               <li>A</li>
               <li>B</li>
               <li>C</li>
               <li>D</li>
               <li>E</li>
               <li>F</li>
            </ul>
         </div>
         <div>
            <?php if (isset($_SESSION['id-usuario'])) : ?>
               <a href="logout.php">Cerrar Sesión</a>

            <?php elseif (isset($_COOKIE['id-usuario'])) :
               $usuario = traer_usuario_por_id($_COOKIE['id-usuario']);
               if ($usuario) {
                  crear_sesion($usuario);
               } ?>
               <a href="logout.php">Cerrar Sesión</a>
            
            <?php else : ?>
               <a href="login.php">Ingresar</a>
               <a href="registro.php">Registrate</a>
            <?php endif ?>
         </div>
      </nav>
   </header>

   <main>
      <section>
         <?php if (isset($_SESSION['id-usuario'])) : ?>
            <h1>
               Hola, <?= $_SESSION['nombre'] ?>
            </h1>
            <h2>
               ¡Bienvenido!
            </h2>
            <p>
               <?php var_dump($_SESSION) ?>
               <?php var_dump($_COOKIE) ?>
            </p>
         <?php endif ?>
      </section>
   </main>
</body>
</html>
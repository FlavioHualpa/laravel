<?php

  $nombre = 'Flavio';
  $esGanador = rand(0, 1);
  $sitios = [
    [
      "nombre" => "Google",
      "link" => "https://google.com.ar",
    ],
    [
      "nombre" => "Facebook",
      "link" => "https://facebook.com",
    ],
    [
      "nombre" => "Twitter",
      "link" => "https://twitter.com",
    ],
  ];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Embebiendo PHP</title>
    <style media="screen">
      body {
        font-family: 'Bookman Old Style';
        font-size: 36px;
      }
    </style>
  </head>
  <body>
    <h1>La Internet</h1>
    <marquee>Bienvenidos al mundo de la internet</marquee>
    <h2>Bienvenido <?=$nombre?></h2>
    <h3>¿Es usted un ganador? <?= $esGanador ? 'SI' : 'NO'; ?></h3>

    <h3>Algunos sitios interesantes:</h3>
    <ul>
      <?php foreach($sitios as $sitio) : ?>
        <li>
          <a href="<?=$sitio['link']?>">
            <?=$sitio['nombre']?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>

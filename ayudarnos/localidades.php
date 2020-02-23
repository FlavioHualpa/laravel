<?php

   $datos = file_get_contents('localidades.json');
   $loc = json_decode($datos, true);
   $listado = json_encode($loc, JSON_PRETTY_PRINT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Localidades de Argentina</title>
</head>
<body>
   <h2>Cantidad de localidades: <?= count($loc['localidades']) ?></h2>

   <?php

      // $dsn = 'mysql:host=localhost;dbname=ayudarnos;port=3316';
      // $user = 'root';
      // $pass = 'digitalhouse';
      // $db = new PDO($dsn, $user, $pass);

      $id = 0;
      $prov = '';
      $lista = [];
      foreach($loc['localidades'] as $localidad) {
         // $stmt = $db->prepare('INSERT INTO localidades VALUES(?,?,?)');
         // $stmt->bindValue(1, null);
         // $stmt->bindValue(2, $localidad['nombre']);
         // $stmt->bindValue(3, $localidad['provincia']['id']);
         // $stmt->execute();
         if ($localidad['provincia']['nombre'] != $prov) {
            $prov = $localidad['provincia']['nombre'];
            $id = $localidad['provincia']['id'];
            if (!isset($lista[$id])) {
               $lista[$id] = $prov;
            }
         }
      }

      foreach ($lista as $id => $prov) : ?>
         <h4><?= $prov . ' (' . $id . ')' ?></h4>
      <?php
      endforeach;

      echo count($lista);

   ?>

   <!--
   <?php for ($i = 0; $i < 16; $i++) : ?>
      <h4>
         <?= $loc['localidades'][$i]['id'] ?>
         <?= ' -- ' ?>
         <?= ucwords(strtolower($loc['localidades'][$i]['nombre'])) ?>
         <?= ' -- ' ?>
         <?= $loc['localidades'][$i]['municipio']['nombre'] ?>
         <?= ' -- ' ?>
         <?= $loc['localidades'][$i]['departamento']['nombre'] ?>
         <?= ' -- ' ?>
         <?= $loc['localidades'][$i]['provincia']['nombre'] ?>
      </h4>
   <?php endfor ?>
   -->

   <!--
   <h4><?php var_dump($loc['localidades'][0]) ?></h4>
   <h4><?php var_dump($loc['localidades'][1]) ?></h4>
   <h4><?php var_dump($loc['localidades'][2]) ?></h4>
   -->

</body>
</html>

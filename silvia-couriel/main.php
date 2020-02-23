<?php
session_start();
require_once 'lang/load.php';
require_once 'menuopt.php';
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i&display=swap">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="<?= $styles[$section] ?>">
    <link rel="stylesheet" href="css/landscape.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Silvia Couriel</title>
  </head>

  <body>

    <audio id="audio-track" loop>
      <source src="audio/BsAsTangoNorm.mp3" type="audio/mpeg">
    </audio>

    <header>
      <h1><?= lang('index.title') ?></h1>
      <p><?= lang('index.subtitle') ?></p>
      <i class="fas fa-bars"></i>
      <span>
        <i class="fas fa-music" title="music on"></i>
        <i class="fas fa-volume-up" style="display: none;" title="music on"></i>
        <i class="fas fa-volume-mute" style="display: none;" title="music on"></i>
      </span>
    </header>

    <?php
    include $includes[$section];
    ?>

    <?php
    include 'inc/slidemenu.php';
    ?>

  </body>

  <script>
    <?= 'var gallery = ' . json_encode($gallery) ?>
  </script>
  <script src="js/main.js"></script>
  <script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
</html>

<?php
require_once 'lang/load.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <link href="https://fonts.googleapis.com/css?family=Merienda:400,700" rel="stylesheet">
  <title>Silvia Couriel</title>
  <style>
    .marco-ext
    {
      margin: 10px auto;
      padding-top: 95%;
      width: 95%;
      /* border: 1px dashed #900000; */
      position: relative;
    }
    .marco-int
    {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
    }
    .marco-ext img
    {
      position: absolute;
      max-width: 100%;
      height: 100%;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      box-shadow: 3px 3px 6px;
    }
  </style>
</head>
<body>
  <header>
    <h1><?= lang('index.title') ?></h1>
    <p><?= lang('index.subtitle') ?></p>
  </header>
  <div class="container">
    <div class="marco-ext">
      <!-- <div class="marco-int"> -->
        <img src="img/portada-1.png" alt="">
        <img src="img/portada-5.jpeg" alt="">
      <!-- </div> -->
    </div>
  </div>
  <footer>
    <h3><?= lang('index.subtitle') ?></h3>
    <h3><?= lang('index.footer') ?></h3>
    <h3><?= lang('main.form.firstname') ?></h3>
  </footer>
</body>
<script src="js/index.js"></script>
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
</html>

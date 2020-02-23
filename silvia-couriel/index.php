<?php

if (isset($_COOKIE['user-lang'])) {
  header('location: main.php');
  exit;
}

require_once 'lang/load.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/index.css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Merienda:400,700" rel="stylesheet"> -->
  <title>Silvia Couriel</title>
</head>
<body>
  <header>
    <h1><?= lang('index.title') ?></h1>
    <p><?= lang('index.subtitle') ?></p>
  </header>
  <div class="container">
    <div class="panel-izq">
      <div class="gallery">
        <div class="frame">
          <img src="img/portada/portada-6.jpeg" alt="Silvia Couriel">
          <img src="img/portada/portada-4.jpeg" alt="Silvia Couriel">
          <img src="img/portada/portada-5.jpeg" alt="Silvia Couriel">
        </div>
      </div>
    </div>
    <div class="panel-der">
      <div class="language">
        <div class="lang-col">
          <img src="img/Argentina_flag.png" alt="Español">
          <a href="setlang.php?lang=esp">Español</a>
        </div>
        <div class="lang-col">
          <img src="img/UK_flag.png" alt="English">
          <a href="setlang.php?lang=ing">English</a>
        </div>
      </div>
      <div class="contact">
        <i class="fas fa-envelope-open-text"></i>
        <a href="mailto:courielsilvia@gmail.com">courielsilvia@gmail.com</a>
      </div>
    </div>
  </div>
</body>
<script src="js/index.js"></script>
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
</html>

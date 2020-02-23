<?php
require_once 'lang/load.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Merienda:400,700" rel="stylesheet">
  <title>Silvia Couriel</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Merienda;
    }
    body {
      height: 100vh;
    }
    main {
      height: calc(100% - 80px);
    }
    .container {
      width: 95%;
      height: 100%;
      margin: 0 auto;
      display: flex;
      flex-wrap: wrap;
      align-items: stretch;
    }
    .panel-izq {
      width: calc(60% - 8px);
      height: calc(100% - 16px);
      border: 1px solid #00c000;
      margin: 8px;
      margin-right: 0;
    }
    .panel-der {
      width: calc(40% - 16px);
      border: 1px solid #c00000;
      margin: 8px;
    }

    @media (orientation: portrait)
    {
      .panel-izq {
        width: 100%;
        margin-right: 8px;
        margin-bottom: 0;
      }
      .panel-der {
        width: 100%;
      }
    
    }
  </style>

</head>
<body>
  <header>
    <h1><?= lang('index.title') ?></h1>
    <p><?= lang('index.subtitle') ?></p>
  </header>
  <main>
    <div class="container">
      <div class="panel-izq">
          <img src="img/portada-2.png" alt="foto" style="max-width: 100%; height: 100%;">
          <!-- <div style="border: 1px solid #00c000; height: 50%;"></div> -->
      </div>
      <div class="panel-der">
        <img src="img/portada-1.png" alt="foto" style="width: 100%;">
      </div>
    </div>
  </main>
</body>
</html>

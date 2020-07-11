<?php require_once 'src/resumen.php' ?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/styles.css">
   <title>Néstor Zadoff</title>
</head>

<body>

   <header class="banner">
   </header>

   <div class="container">
      <section class="table">
         <h2 class="title">
            CONTABILIZACIÓN DE DESCARGAS DE PDF
         </h2>
         <br>

         <!-- TABLA DE ÚLTIMAS DESCARGAS -->
         <div class="fila-tabla">
            <span class="titulo-tabla">ÚLTIMAS DESCARGAS</span>
         </div>

         <div class="fila-tabla medium-device">
            <span class="encabezado-tabla" style="width: 38%;">Obra</span>
            <span class="encabezado-tabla" style="width: 22%; text-align: right;">Fecha</span>
            <span class="encabezado-tabla" style="width: 18%; padding-left: 15px;">País</span>
            <span class="encabezado-tabla" style="width: 22%; padding-left: 15px;">Ciudad</span>
         </div>

         <?php foreach ($byDate as $download) : ?>
         <div class="fila-tabla medium-device resaltable">
            <span class="celda-tabla" style="width: 38%;">
               <?= $download['nombre'] ?>
            </span>
            <span class="celda-tabla" style="width: 22%; text-align: right;">
               <?= $download['fechahora'] ?>
            </span>
            <span class="celda-tabla" style="width: 18%; padding-left: 15px;">
               <?= $download['pais'] ?>
            </span>
            <span class="celda-tabla" style="width: 22%; padding-left: 15px;">
               <?= $download['ciudad'] ?>
            </span>
         </div>
         <div class="fila-tabla small-device">
            <span class="celda-tabla" style="width: 40%;">
               <strong>Obra</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['nombre'] ?>
            </span>
            <span class="celda-tabla" style="width: 40%;">
               <strong>Fecha</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['fechahora'] ?>
            </span>
            <span class="celda-tabla" style="width: 40%;">
               <strong>País</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['pais'] ?>
            </span>
            <span class="celda-tabla" style="width: 40%;">
               <strong>Ciudad</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['ciudad'] ?>
            </span>
         </div>
         <?php endforeach ?>

         <div class="fila-tabla">
            <span class="encabezado-tabla" style="width: 100%;">
               &nbsp;
            </span>
         </div>
         <!-- FIN DE TABLA DE ÚLTIMAS DESCARGAS -->
      </section>
   </div>

</body>
</html>

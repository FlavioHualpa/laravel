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
      <section class="text">
         <h2 class="title">
            CONTABILIZACIÓN DE DESCARGAS DE PDF
         </h2>
         <a href="#ultimas" class="totals-link">
            Ir a últimas descargas
         </a>
         <a href="#porObra" class="totals-link">
            Ir a descargas por obra
         </a>
         <a href="#porDescargas" class="totals-link">
            Ir a descargas por cantidad
         </a>
         <a href="#porPais" class="totals-link">
            Ir a descargas por país
         </a>
         <br>
         <br>
      </section>

      <section class="table" id="ultimas">
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
               <?= utf8_encode($download['nombre']) ?>
            </span>
            <span class="celda-tabla align-right" style="width: 22%;">
               <?= $download['fechahora'] ?>
            </span>
            <span class="celda-tabla" style="width: 18%; padding-left: 15px;">
               <?= isset($iso_pais[$download['pais']]) ?
                  $iso_pais[$download['pais']] :
                  'Indeterminado'
               ?>
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
               <?= utf8_encode($download['nombre']) ?>
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
               <?= isset($iso_pais[$download['pais']]) ?
                  $iso_pais[$download['pais']] :
                  'Indeterminado'
               ?>
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

      <?php foreach($tables as $table) : ?>
      <section class="table" id="<?= $table['id'] ?>">
         <!-- INICIO DE TABLA -->
         <div class="fila-tabla">
            <span class="titulo-tabla">
               <?= $table['title'] ?>
            </span>
         </div>

         <div class="fila-tabla medium-device">
            <span class="encabezado-tabla" style="width: 40%;">
               <?= $table['headers'][0] ?>
            </span>
            <span class="encabezado-tabla align-right" style="width: 20%;">
               Últimos 7 días
            </span>
            <span class="encabezado-tabla align-right" style="width: 20%;">
               Últimos 30 días
            </span>
            <span class="encabezado-tabla align-right" style="width: 20%;">
               Todas
            </span>
         </div>

         <?php foreach ($table['rows'] as $download) : ?>
         <div class="fila-tabla medium-device resaltable">
            <span class="celda-tabla" style="width: 40%;">
               <?= $table['first_field']($download) ?>
            </span>
            <span class="celda-tabla align-right" style="width: 20%;">
               <?= $download['ultimos7dias'] ?>
            </span>
            <span class="celda-tabla align-right" style="width: 20%;">
               <?= $download['ultimos30dias'] ?>
            </span>
            <span class="celda-tabla align-right" style="width: 20%;">
               <?= $download['todas'] ?>
            </span>
         </div>
         <div class="fila-tabla small-device">
            <span class="celda-tabla" style="width: 40%;">
               <strong>
                  <?= $table['headers'][0] ?>
               </strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $table['first_field']($download) ?>
            </span>
            <span class="celda-tabla" style="width: 40%;">
               <strong>Últimos 7 días</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['ultimos7dias'] ?>
            </span>
            <span class="celda-tabla" style="width: 40%;">
               <strong>Últimos 30 días</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['ultimos30dias'] ?>
            </span>
            <span class="celda-tabla" style="width: 40%;">
               <strong>Todas</strong>
            </span>
            <span class="celda-tabla" style="width: 60%;">
               <?= $download['todas'] ?>
            </span>
         </div>
         <?php endforeach ?>

         <div class="fila-tabla">
            <span class="encabezado-tabla" style="width: 40%;">
               Totales
            </span>
            <span class="encabezado-tabla align-right" style="width: 20%;">
               <?= $byPeriod['ultimos7dias'] ?>
            </span>
            <span class="encabezado-tabla align-right" style="width: 20%;">
               <?= $byPeriod['ultimos30dias'] ?>
            </span>
            <span class="encabezado-tabla align-right" style="width: 20%;">
               <?= $byPeriod['todas'] ?>
            </span>
         </div>
         <!-- FIN DE TABLA -->
      </section>
      <?php endforeach ?>

   </div>

</body>
</html>

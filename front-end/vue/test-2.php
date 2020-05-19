<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Pruebas con Vue.js</title>
   <link rel="stylesheet" href="css/main.css">
   <link rel="stylesheet" href="css/ui.css">
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
</head>
<body style="background-color: #f2f2f2">
   <div class="container">
      <div class="mt-5 tab-component">
         <div class="tab-stops">
            <span v-for="tabStop in tabStops"
               class="tab-stop"
               :style="zIndex(tabStop.z)"
               v-text="tabStop.title"
               @click="changeToTab(tabStop.index)"
            >
            </span>
         </div>
         <div class="tab-pages">
            <div class="tab-page">
            </div>
         </div>
      </div>

      <p class="my-4"> </p>
      <div style="border: 1px solid #d0d0d0; display: flex;">
         <span style="background-color: #a0d0d0; padding: 20px;">
            BLOQUE EN LINEA
         </span>
         <span style="background-color: #a0d0d0; padding: 20px;">
            BLOQUE EN LINEA
         </span>
         <span style="background-color: #a0d0d0; padding: 20px;">
            BLOQUE EN LINEA
         </span>
      </div>
   </div>

   <script src="js/pages.js"></script>
</body>
</html>

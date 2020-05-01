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
<body>
   <div class="container">
      <h1 class="mt-2">Título Nivel 1</h1>
      <h2 class="mt-2">Título Nivel 2</h2>
      <h3 class="mt-2">Título Nivel 3</h3>
      <h4 class="mt-2">Título Nivel 4</h4>
      <h5 class="mt-2">Título Nivel 5</h5>
      <h6 class="mt-2">Título Nivel 6</h6>
      <p class="my-4">Prueba de párrafo con un <a href="#">link agregado</a></p>
      <a href="#" class="btn btn-primary">Botón Primario</a>

      <div id="app" class="mt-5">
         <progressbar percent="15" message="message"></progressbar>

         <p class="my-4"></p>
         <ul class="navbar">
            <li v-for="item in items"
               v-text="item.title"
               class="nav-item"
               @mouseover="showInfo(item.description)"
               @mouseout="hideInfo"
            >
            </li>
         </ul>
         <span v-show="isInfoVisible" class="info-badge">{{ info }}</span>
      </div>
   </div>

   <script src="js/vue.js"></script>
</body>
</html>

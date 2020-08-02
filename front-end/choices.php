<?php

$input = $_GET;

if (isset($input['choice'])) :

?>

<p>Tus elecciones</p>

<ul>
   
   <?php foreach ($input['choice'] as $choice) : ?>
   
      <?php if (isset($choice['color'])) : ?>

         <li> <?= $choice['color'] . ' => ' . $choice['order'] ?> </li>

      <?php endif ?>
   
   <?php endforeach ?>

</ul>

<p></p>

<?php endif ?>

<!doctype html>
<html>
<head>
   <style>
      * {
         font-family: Calibri;
         box-sizing: border-box;
      }

      body {
         font-size: 1.1em;
      }

      input[type=checkbox] {
         transform: scale(1.25);
      }

      #map {
         height: 400px;  /* The height is 400 pixels */
         width: 100%;  /* The width is the width of the web page */
      }
   </style>
</head>

<body>
   <p>Elija opciones</p>
   <form>
      <div>
         <input type="checkbox" name="choice[0][color]" id="choice-1" value="amarillo" <?= isset($input['choice'][0]['color']) ? 'checked' : '' ?>>
         <label for="choice-1">amarillo</label>
         <input type="text" name="choice[0][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[1][color]" id="choice-2" value="azul" <?= isset($input['choice'][1]['color']) ? 'checked' : '' ?>>
         <label for="choice-2">azul</label>
         <input type="text" name="choice[1][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[2][color]" id="choice-3" value="rojo" <?= isset($input['choice'][2]['color']) ? 'checked' : '' ?>>
         <label for="choice-3">rojo</label>
         <input type="text" name="choice[2][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[3][color]" id="choice-4" value="verde" <?= isset($input['choice'][3]['color']) ? 'checked' : '' ?>>
         <label for="choice-4">verde</label>
         <input type="text" name="choice[3][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[4][color]" id="choice-5" value="celeste" <?= isset($input['choice'][4]['color']) ? 'checked' : '' ?>>
         <label for="choice-5">celeste</label>
         <input type="text" name="choice[4][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[5][color]" id="choice-6" value="naranja" <?= isset($input['choice'][5]['color']) ? 'checked' : '' ?>>
         <label for="choice-6">naranja</label>
         <input type="text" name="choice[5][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[6][color]" id="choice-7" value="marron" <?= isset($input['choice'][6]['color']) ? 'checked' : '' ?>>
         <label for="choice-7">marron</label>
         <input type="text" name="choice[6][order]" value="1">
      </div>
      <div>
         <input type="checkbox" name="choice[7][color]" id="choice-8" value="violeta" <?= isset($input['choice'][7]['color']) ? 'checked' : '' ?>>
         <label for="choice-8">violeta</label>
         <input type="text" name="choice[7][order]" value="1">
      </div>
      <div>
         <input type="submit" value="Enviar">
      </div>
   </form>

   <h3>My Google Maps Demo</h3>

   <!-- <iframe src="https://maps.google.com/maps/embed/v1/directions?key=AIzaSyBwa69-a43uuujfbQ6dQQiNH0SIVo8d3ec&origin=Acevedo+320,Buenos+Aires&waypoints=Serrano+560,Buenos+Aires&destination=Darwin+1109,Buenos+Aires" width="800" height="480" style="border: none;">
   </iframe> -->

   <!--The div element for the map-->
   <div id="map">
   </div>

   <script>
      // Initialize and add the map
      function initMap() {
         // The location of Uluru
         var uluru = {lat: -25.344, lng: 131.036};

         // The map, centered at Uluru
         var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 20, center: uluru});

         // The marker, positioned at Uluru
         var marker = new google.maps.Marker({position: uluru, map: map});
      }
   </script>

   <script
      async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNnK0mHUXVILDkM8DZoXnEIYyLpjdmCLE&callback=initMap"
   >
   </script>
</body>
</html>

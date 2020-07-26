<?php

$input = $_GET;

if (isset($input['choice'])) :
?>

<p>Tus elecciones</p>

<ul>
	
	<?php foreach ($input['choice'] as $choice) : ?>
	
	<li> <?= $choice ?> </li>
	
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
			<input type="checkbox" name="choice[0]" id="choice-1" value="amarillo">
			<label for="choice-1">amarillo</label>
		</div>
		<div>
			<input type="checkbox" name="choice[1]" id="choice-2" value="azul">
			<label for="choice-2">azul</label>
		</div>
		<div>
			<input type="checkbox" name="choice[2]" id="choice-3" value="rojo">
			<label for="choice-3">rojo</label>
		</div>
		<div>
			<input type="checkbox" name="choice[3]" id="choice-4" value="verde">
			<label for="choice-4">verde</label>
		</div>
		<div>
			<input type="checkbox" name="choice[4]" id="choice-5" value="celeste">
			<label for="choice-5">celeste</label>
		</div>
		<div>
			<input type="checkbox" name="choice[5]" id="choice-6" value="naranja">
			<label for="choice-6">naranja</label>
		</div>
		<div>
			<input type="checkbox" name="choice[6]" id="choice-7" value="marron">
			<label for="choice-7">marron</label>
		</div>
		<div>
			<input type="checkbox" name="choice[7]" id="choice-8" value="violeta">
			<label for="choice-8">violeta</label>
		</div>
		<div>
			<input type="submit" value="Enviar">
		</div>
	</form>

	<h3>My Google Maps Demo</h3>

	<iframe src="https://maps.google.com/maps/embed/v1/directions?key=AIzaSyBwa69-a43uuujfbQ6dQQiNH0SIVo8d3ec&origin=Acevedo+320,Buenos+Aires&waypoints=Serrano+560,Buenos+Aires&destination=Darwin+1109,Buenos+Aires" width="800" height="480" style="border: none;">
	</iframe>

	<!--The div element for the map
	<div id="map">
	</div>-->

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

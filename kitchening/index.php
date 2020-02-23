<?php

$productos = [
	[
		"id" => 1,
		"titulo" => "Metrel",
		"descripcion" => "Instrumentos portátiles para análisis de energía, prueba de aislación, resistencia de tierra, impedancia de lazos, etc.",
		"precio" => 300,
		"imagen" => "img-pdto-1.jpg",
		"enOferta" => true,
	],
	[
		"id" => 2,
		"titulo" => "Electro Industries",
		"descripcion" => "Analizadores de energía de alta precisión. Soluciones de red inteligentes en la medición de energía, potencia y calidad de avanzada en telemetría.",
		"precio" => 500,
		"imagen" => "img-pdto-2.jpg",
		"enOferta" => false,
	],
	[
		"id" => 3,
		"titulo" => "ETS Lindgren",
		"descripcion" => "Medidores portátiles de campos eléctricos, magneticos y de fugas de microondas. Para frecuencias industriales y RF con sondas intercambiables hasta 40 GHz.",
		"precio" => 620,
		"imagen" => "img-pdto-3.jpg",
		"enOferta" => false,
	],
	[
		"id" => 4,
		"titulo" => "Hameg Instruments",
		"descripcion" => "Osciloscopios para laboratorio, analizadores de espectro, multímetros para laboratorio, trazador de curvas, fuentes, generadores de funciones.",
		"precio" => 480,
		"imagen" => "img-pdto-2.jpg",
		"enOferta" => true,
	],
	[
		"id" => 5,
		"titulo" => "MTE",
		"descripcion" => "Equipos de ensayo portátiles y estacionarios para calibración y certificación de medidores de energía.",
		"precio" => 770,
		"imagen" => "img-pdto-1.jpg",
		"enOferta" => false,
	],
	[
		"id" => 6,
		"titulo" => "SACI",
		"descripcion" => "Equipos y sistemas de medida y control de magnitudes eléctricas de panel, analógicos y digitales.",
		"precio" => 510,
		"imagen" => "img-pdto-1.jpg",
		"enOferta" => true,
	],
	[
		"id" => 7,
		"titulo" => "Suparule",
		"descripcion" => "Equipos de prueba y medición.",
		"precio" => 510,
		"imagen" => "img-pdto-3.jpg",
		"enOferta" => false,
	],
	[
		"id" => 8,
		"titulo" => "Thermoteknix Systems",
		"descripcion" => "Cámaras termográficas de alta gama para distintas aplicaciones industriales.",
		"precio" => 910,
		"imagen" => "img-pdto-2.jpg",
		"enOferta" => false,
	],
	[
		"id" => 9,
		"titulo" => "Zensol",
		"descripcion" => "Equipos para prueba y ensayos de interruptores, transformadores, reconectadores y cambiadores de tasas de carga de MT y AT.",
		"precio" => 630,
		"imagen" => "img-pdto-1.jpg",
		"enOferta" => true,
	],
	[
		"id" => 10,
		"titulo" => "Iskraemeco",
		"descripcion" => "Medidores de energía eléctrica para aplicaciones residenciales y comerciales.",
		"precio" => 490,
		"imagen" => "img-pdto-2.jpg",
		"enOferta" => true,
	],
];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/styles.css">
		<title>Responsive Web Design</title>
	</head>
	<body>

	<div class="container">

		<!-- cabecera -->
		<header class="main-header">
			<img src="images/logo.jpg" alt="logotipo" class="logo">

			<a href="#" class="toggle-nav">
				<span class="fa fa-bars"></span>
			</a>

			<nav class="main-nav">
				<ul>
					<li><a href="#">home</a></li>
					<li><a href="#">quienes</a></li>
					<li><a href="#">servicios</a></li>
					<li><a href="#">portfolio</a></li>
					<li><a href="#">sucursales</a></li>
					<li><a href="#">contacto</a></li>
				</ul>
			</nav>
		</header>

		<!-- banner -->
		<section class="banner">
			<img src="images/img-banner.jpg" alt="banner">
		</section>

		<!-- productos -->
		<section class="vip-products">

			<?php foreach ($productos as $producto) : ?>

				<article class="product">
					<div class="photo-container">
						<img class="photo" src="<?= 'images/' . $producto['imagen'] ?>" alt="<?= $producto['titulo'] ?>">

						<?php if ($producto['enOferta']) : ?>
							<img class="special" src="images/img-descuento.png" alt="en oferta">
						<?php elseif (rand(0, 1)) : ?>
							<img class="special" src="images/img-nuevo.png" alt="producto nuevo">
						<?php else : ?>
							<img class="special" src="images/img-gratis.png" alt="producto gratis">
						<?php endif ?>

						<a class="zoom" href="#">Ampliar foto</a>
					</div>
					<h2><?= $producto['titulo'] ?></h2>
					<p><?= $producto['descripcion'] ?></p>
					<a class="more" href="ampliarProducto.php?id=<? $producto['id'] ?>">ver más</a>
				</article>

			<?php endforeach ?>

		</section>

		<footer class="main-footer">
			<ul>
				<li><a href="#">home</a></li>
				<li><a href="#">quienes</a></li>
				<li><a href="#">servicios</a></li>
				<li><a href="#">portfolio</a></li>
				<li><a href="#">sucursales</a></li>
				<li><a href="#">contacto</a></li>
			</ul>
		</footer>
	</div>

	</body>
</html>

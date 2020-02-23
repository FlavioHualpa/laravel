<!DOCTYPE html>
<html style="height: 100%;">
	<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>Néstor Zadoff</title>

	<?php

		$id = $_GET['id'];
		$arch = fopen("descargas.txt", "r");
		$marca = fread($arch, 3); // marca de codificación de caracteres, 3 bytes para UTF-8 : ef bb bf
		$i = 0;
		$idx = 0;
		while (!feof($arch))
		{
			$linea = fgets($arch);
			if ($linea == "") { break; }
			$reg = explode(":", $linea);
			$key[$i] = intval($reg[0]);
			$pdf[$i] = $reg[1];
			$cont2[$i] = intval($reg[2]);
			if ($key[$i] == $id) { $cont2[$i]++; $idx = $i; }
			$i++;
		}
		fclose($arch);

		$filename = $pdf[$idx];
		//$tam = filesize("pdfs/$filename");
		//header("content-type: application/pdf");
		//header("content-length: $tam");
		//header("content-disposition: inline; filename=$filename");
		//readfile("pdfs/$filename");
	?>

	</head>

	<body style="margin: 0px; height: 100%;">
		<!--
		<?php echo "pdfs/$filename"; ?>
		<object data="<?php echo "pdfs/$filename"; ?>" type="application/pdf" width="100%" height="100%">
		</object>
		<object data="../pdfs/Zamba para pepe.pdf" type="application/pdf" width="100%" height="100%">
		</object>
		<embed src="../pdfs/Zamba para pepe.pdf" width="100%" height="100%">
		</embed>
		-->
		<iframe src="http://nestorzadoff.com.ar/pdfs/Zamba del nuevo día.pdf" width="100%" height="98%" frameborder="0" style="width: 100%; height: 99%;">
		</iframe>
	</body>
</html>
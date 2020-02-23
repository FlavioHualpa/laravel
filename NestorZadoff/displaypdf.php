<!DOCTYPE html>
<html style="height: 100%;">
	<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
	<title>Néstor Zadoff</title>

	<?php

		$bots = ["bingbot", "dotbot", "googlebot", "megaindex"];

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		if (!empty($userAgent))
			foreach ($bots as $bot)
				if (stripos($userAgent, $bot) !== false)
					exit;
		
		/*
		$url = "http://api.wipmania.com/".$ip;
		$country = file_get_contents($url);
		*/
		$url = "http://api.ipstack.com/$ip?access_key=a2a17aa9edfcc9b0a5f7e7bc7a7d8898";
		$info = file_get_contents($url);
		if (preg_match_all("/\"(country_code)\":\"(\w\w)\"/", $info, $output_array) > 0)
			$country = $output_array[2][0];

		$arch = fopen("paises.txt", "r");
		$marca = fread($arch, 3); // marca de codificación de caracteres, 3 bytes para UTF-8 : ef bb bf
		$i = 0;
		$idx = -1;
		while (!feof($arch))
		{
			$linea = fgets($arch);
			if ($linea == "") { break; }
			$reg = explode(":", $linea);
			$pais[$i] = $reg[0];
			$cont1[$i] = intval($reg[1]);
			if ($pais[$i] == $country) { $cont1[$i]++; $idx = $i; }
			$i++;
		}
		fclose($arch);

		$arch = fopen("paises.txt", "w");
		fwrite($arch, $marca);
		for ($j = 0; $j < $i; $j++)
		{
			$linea = sprintf("%s:%d\n", $pais[$j], $cont1[$j]);
			fwrite($arch, $linea);
		}
		if ($idx == -1)
		{
			$linea = sprintf("%s:%d\n", $country, 1);
			fwrite($arch, $linea);
		}
		fclose($arch);

		if ($country == "XX" || $country == "")
		{
			$arch = fopen("ip-indeterm.txt", "a");
			fwrite($arch, date("d/m/y")." - ".$ip."\n");
			fclose($arch);
		}

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
			//echo "$key[$i] ";
			//echo "$pdf[$i] ";
			//echo "$cont[$i] ";
			//echo "$pdf[$i] ";
			//if (file_exists("pdfs/$pdf[$i]")) echo "true";
			//else echo "false";
			if ($key[$i] == $id) { $cont2[$i]++; $idx = $i; }
			$i++;
		}
		fclose($arch);

		$arch = fopen("descargas.txt", "w");
		fwrite($arch, $marca);
		for ($j = 0; $j < $i; $j++)
		{
			$linea = sprintf("%02d:%s:%d\n", $key[$j], $pdf[$j], $cont2[$j]);
			fwrite($arch, $linea);
		}
		fclose($arch);

		//$debug = fopen("debug.txt", "a");
		//fwrite($debug, date('g:i:s').'\n');
		//fclose($debug);

		$filename = $pdf[$idx];
		//$tam = filesize("pdfs/$filename");
		//header("content-type: application/pdf");
		//header("content-length: $tam");
		//header("content-disposition: inline; filename=$filename");
		//readfile("pdfs/$filename");

		// AGREGADO EL 22/2/19
		// AHORA REGISTRO EN LA BASE WEBNZ LA FECHA Y EL PAIS
		// DE LA DESCARGA PARA UN LISTADO CON MAS INFORMACION
		
        $conn = new mysqli("localhost", "flaviohualpa", "pantera.roSA.719", "webnz");
        if ($conn->connection_error)
        {
            die("No me pude conectar con la base de datos.\n".$conn->connection_error);
        }

		$sql = "UPDATE pdfs SET descargas = descargas + 1 WHERE id = $id";
		$conn->query($sql);

		$fecha = date("Y/m/d H:m:s");
        $sql = "INSERT INTO descargas (ce_pdf, fecha, pais) VALUES($id, '$fecha', '$country')";
        $conn->query($sql);
		$conn->close();
	?>
	</head>

	<body style="margin: 0px; height: 100%">
		<!--
		<object data="<?php echo "pdfs/$filename"; ?>" type="application/pdf" width="100%" height="100%">
		</object>
		-->
		<iframe src="<?php echo "https://nestorzadoff.com.ar/pdfs/".$filename; ?>" width="100%" height="99%" frameborder="0">
		</iframe>
	</body>
</html>
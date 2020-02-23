
<?php
error_reporting(0);
$nombre = $_POST['nombre'];
$correo_electronico = $_POST['email'];
$consulta = $_POST['coment'];
$header = "From: " . $correo_electronico . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Mensaje fue enviado por " . $nombre . " (" . $correo_electronico . ") el " . date('d/m/Y', time()) . ".\r\n\r\n";
$mensaje .= $consulta;

$para = 'info@nestorzadoff.com.ar';
$asunto = 'CONSULTA DESDE TU WEB';

mail($para, $asunto, utf8_decode($mensaje), $header);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Néstor Zadoff</title>

<link href="style_00.css" rel="stylesheet" type="text/css">
<link href="style_01.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="div_hd">
        <div id="div_hd_title">
            <div id="div_hd_title_mail"><a href="mailto:info@nestorzadoff.com.ar" target="_blank"><img src="./img/hd_title_mail.jpg" alt="Mail" border="0"></a></div>
        </div>
        <!-- <div id="div_hd_logo">&nbsp;</div> -->
    </div>
	<div>
		<p class="titulo_panel">&nbsp;&nbsp;&nbsp;&nbsp;GRACIAS! TU CONSULTA FUE ENVIADA.</p><br />
		<p class="texto_panel"><a href="index.php">&nbsp;&nbsp;&nbsp;&nbsp;&lt;&lt; VOLVER</a></p><br />
	</div>
</body>
</html>

<?php
if ($_POST) {
    error_reporting(0);
    $nombre = trim($_POST['nombre']);
    $correo_electronico = trim($_POST['email']);
    $consulta = trim($_POST['coment']);
    $header = "From: " . $correo_electronico . "\r\n";
    $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
    $header .= "Mime-Version: 1.0 \r\n";
    $header .= "Content-Type: text/plain";

    $errors = [];
    if (empty($nombre)) {
        $errors['name'] = 'Veuillez indiquer votre nom';
    }
    if (empty($correo_electronico)) {
        $errors['email'] = 'Veuillez indiquer votre adresse électronique';
    } else if (!filter_var($correo_electronico, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Veuillez entrer une adresse électronique valide';
    }
    if (empty($consulta)) {
        $errors['comment'] = 'Veuillez fournir une consultation';
    }

    $mensaje = "Mensaje enviado por " . $nombre . " (" . $correo_electronico . ") el " . date('d/m/Y', time()) . ".\r\n\r\n";
    $mensaje .= $consulta;

    $para = 'info@nestorzadoff.com.ar';
    $asunto = 'CONSULTA DESDE TU WEB';
}
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
        <?php
            
        if (count($errors)) :
            foreach ($errors as $error) :
        
        ?>

                <p class="titulo_panel" style="color: #d00000">&nbsp;&nbsp;&nbsp;&nbsp;&bullet; <?= $error ?></p><br />

        <?php

            endforeach;
        
        ?>

            <p class="texto_panel"><a href="javascript:history.go(-1)">&nbsp;&nbsp;&nbsp;&nbsp;&lt;&lt; REVENIR</a></p><br />
        
        <?php

        else :

            mail($para, $asunto, utf8_decode($mensaje), $header);

        ?>
        
            <p class="titulo_panel">&nbsp;&nbsp;&nbsp;&nbsp;MERCI! VOTRE QUESTION A ÉTÉ ENVOYÉE.</p><br />
            <p class="texto_panel"><a href="index.php">&nbsp;&nbsp;&nbsp;&nbsp;&lt;&lt; ALLER À LA PAGE D'ACCUEIL</a></p><br />
        
        <?php

        endif;

        ?>
	</div>
</body>
</html>
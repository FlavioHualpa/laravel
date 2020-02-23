<!DOCTYPE html>
<html style="height: 100%;">
	<head>
	<meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
    <link href="style_00.css" rel="stylesheet" type="text/css">
    <link href="style_01.css" rel="stylesheet" type="text/css">
	<title>Néstor Zadoff</title>
    </head>

    <body>
	<?php
        $conn = new mysqli("localhost", "flaviohualpa", "pantera.roSA.719", "webnz");
        if ($conn->connection_error)
        {
            die("No me pude conectar con la base de datos.\n".$conn->connection_error);
        }

        $sql = "SELECT * FROM pdfs ORDER BY nombre";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        {
            $f1 = date_create(date("Y/m/d"));
            $f2 = date_create($row["fecha_agregado"]);
            $dias = date_diff($f1, $f2)->d;
            echo "<span class=\"link_panel\">";
            echo "<img src=\"img/acrobat_icon.png\" width=\"24\" height=\"24\" style=\"margin-left: 30px; margin-right: 10px; margin-bottom: 4px; vertical-align: middle;\">";
            echo "<a target=\"_blank\" href=\"displaypdf.php?id=" . $row["id"] . "\">";
            echo utf8_encode($row["nombre"]) . "</a>";
            echo " - <em>" . $row["organico_esp"] . "</em>";
            echo "</span>";
            if ($dias < 10)
                echo "<span class=\"etiqueta_nuevo\">NUEVO</span>";
            if ($row["premiada"])
                echo "<img src=\"img/award-icon.png\" width=\"24\" height=\"24\" style=\"vertical-align: middle;\">";
            echo "<br>";
        }
        $conn->close();
    ?>
    </body>

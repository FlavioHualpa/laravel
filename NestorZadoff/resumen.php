<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=800, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resumen de descargas</title>
    <link rel="stylesheet" href="style_01.css">
    <style>
        body {
            margin-left: 16px;
        }
        .tituloTabla {
            width: 750px;
            background-color: rgb(210, 187, 140);
            font-weight: bold;
            border-top: 1px solid maroon;
            padding: 3px 0px 1px;
            display: inline-block;
            text-align: center;
            cursor: pointer;
        }
        .encabezadoTabla {
            background-color: rgb(210, 187, 140);
            font-weight: bold;
            border-top: 1px solid maroon;
            border-bottom: 1px solid maroon;
            padding: 3px 0px 1px;
            display: inline-block;
            cursor: pointer;
        }
        .pieTabla {
            border-bottom: 1px solid maroon;
            padding-bottom: 2px;
            display: inline-block;
            cursor: pointer;
        }
        .celdaTabla {
            display: inline-block;
            padding: 1px 0px;
        }
        .filaTabla {
            cursor: pointer;
            width: 750px;
        }
        .filaTabla:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <?php
        $conn = new mysqli("localhost", "flaviohualpa", "pantera.roSA.719", "webnz");
        if ($conn->connection_error)
        {
            die("No me pude conectar con la base de datos.\n" . $conn->connection_error);
        }

    	echo "<p class=\"titulo_panel\" style=\"margin-bottom: 0px;\"><u>CONTABILIZACIÓN DE DESCARGAS DE PDF</u></p>";
        echo "<p class=\"texto_panel\" style=\"margin-top: 0px;\"><em>nestorzadoff.com.ar</em></p><br>";

        echo "<div>";
        echo "<span class=\"texto_lista_panel tituloTabla\">DESCARGAS POR OBRA</span><br>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 300px;\">Obra</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">Últimos 7 días</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">Últimos 30 días</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">Todas</span><br>";

        $desdeUnaSemana = date("Y/m/d", mktime(0, 0, 0, date("m"), date("d") - 7, date("Y")));
        $desdeUnMes = date("Y/m/d", mktime(0, 0, 0, date("m") - 1, date("d"), date("Y")));
        $sql = "SELECT id, nombre_pdf, (SELECT COUNT(ce_pdf) AS cantidad FROM descargas WHERE descargas.ce_pdf = pdfs.id AND descargas.fecha >= '$desdeUnaSemana') AS ultimos7dias, (SELECT COUNT(ce_pdf) AS cantidad FROM descargas WHERE descargas.ce_pdf = pdfs.id AND descargas.fecha >= '$desdeUnMes') AS ultimos30dias, pdfs.descargas AS todas FROM pdfs ORDER BY nombre_pdf";
        $result = $conn->query($sql);
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;

        while ($row = $result->fetch_assoc())
        {
            echo "<div class=\"filaTabla\">";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 300px;\">" . utf8_encode($row["nombre_pdf"]) . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 150px; text-align: right;\">" . $row["ultimos7dias"] . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 150px; text-align: right;\">" . $row["ultimos30dias"] . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 150px; text-align: right;\">" . $row["todas"] . "</span>";
            echo "</div>";
            $total1 += $row["ultimos7dias"];
            $total2 += $row["ultimos30dias"];
            $total3 += $row["todas"];
        }

        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 300px;\">Totales</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">" . $total1 . "</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">" . $total2 . "</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">" . $total3 . "</span><br><br><br>";
        echo "</div>";

        echo "<div>";
        echo "<span class=\"texto_lista_panel tituloTabla\">DESCARGAS POR PAÍS</span><br>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 300px;\">País</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">Últimos 7 días</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">Últimos 30 días</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">Todas</span><br>";

        $sql = "SELECT pais, COUNT(pais) AS todas FROM descargas GROUP BY pais ORDER BY todas DESC";
        $result = $conn->query($sql);
        $total1 = 0;
        $total2 = 0;
        $total3 = 0;

        while ($row = $result->fetch_assoc())
        {
            $sql = "SELECT pais, (SELECT COUNT(pais) FROM descargas d2 WHERE d2.pais = '" . $row["pais"] . "' AND d2.fecha >= '$desdeUnaSemana') AS ultimos7dias, (SELECT COUNT(pais) FROM descargas d2 WHERE d2.pais = '" . $row["pais"] . "' AND d2.fecha >= '$desdeUnMes') AS ultimos30dias FROM descargas WHERE pais = '" . $row["pais"] . "'";
            $subResult = $conn->query($sql);
            $row2 = $subResult->fetch_assoc();
            $nombrePais = Iso_a_Pais($row["pais"]);
            echo "<div class=\"filaTabla\">";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 300px;\">" . $nombrePais . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 150px; text-align: right;\">" . $row2["ultimos7dias"] . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 150px; text-align: right;\">" . $row2["ultimos30dias"] . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 150px; text-align: right;\">" . $row["todas"] . "</span><br>";
            echo "</div>";
            $total1 += $row2["ultimos7dias"];
            $total2 += $row2["ultimos30dias"];
            $total3 += $row["todas"];
        }

        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 300px;\">Totales</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">" . $total1 . "</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">" . $total2 . "</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 150px; text-align: right;\">" . $total3 . "</span><br><br><br>";
        echo "</div>";

        echo "<div>";
        echo "<span class=\"texto_lista_panel tituloTabla\">ÚLTIMAS DESCARGAS</span><br>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 300px;\">Obra</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 200px; text-align: right;\">Fecha</span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 235px; padding-left: 15px;\">País</span>";

        $sql = "SELECT nombre_pdf, fecha, pais FROM pdfs INNER JOIN descargas ON pdfs.id = descargas.ce_pdf ORDER BY fecha DESC LIMIT 10";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc())
        {
            $nombrePais = Iso_a_Pais($row["pais"]);
            echo "<div class=\"filaTabla\">";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 300px;\">" . utf8_encode($row["nombre_pdf"]) . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 200px; text-align: right;\">" . $row["fecha"] . "</span>";
            echo "<span class=\"texto_lista_panel celdaTabla\" style=\"width: 235px; padding-left: 15px;\">" . $nombrePais . "</span>";
            echo "</div>";
        }

        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 300px;\"></span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 200px;\"></span>";
        echo "<span class=\"texto_lista_panel encabezadoTabla\" style=\"width: 235px; padding-left: 15px;\"></span><br><br>";
        echo "</div>";

        $conn->close();

        function Iso_a_Pais($iso)
        {
            $iso_pais = array("AC" => "Isla Ascensión", "AD" => "Andorra", "AE" => "Emiratos Árabes Unidos", "AF" => "Afganistán", "AG" => "Antigua y Barbuda", "AI" => "Anguila", "AL" => "Albania", "AM" => "Armenia", "AN" => "Antillas Neerlandesas", "AO" => "Angola", "AQ" => "Antártida", "AR" => "Argentina", "AS" => "Samoa Americana", "AT" => "Austria", "AU" => "Australia", "AW" => "Aruba" , "AX" => "Islas Aland", "AZ" => "Azerbaiyán", "BA" => "Bosnia y Herzegovina", "BB" => "Barbados", "BD" => "Bangladesh", "BE" => "Bélgica", "BF" => "Burkina Faso", "BG" => "Bulgaria", "BH" => "Bahrain", "BI" => "Burundi", "BJ" => "Benin", "BL" => "San Bartolomé", "BM" => "Bermuda", "BN" => "Brunéi", "BO" => "Bolivia", "BR" => "Brasil", "BS" => "Bahamas", "BT" => "Bhutan", "BV" => "Isla Bouvet", "BW" => "Botswana", "BY" => "Bielorrusia", "BZ" => "Belice", "CA" => "Canadá", "CC" => "Cocos (Keeling)", "CD" => "República Democrática del Congo", "CF" => "República Centroafricana", "CG" => "República del Congo", "CH" => "Suiza", "CI" => "Costa de Marfil", "CK" => "Islas Cook", "CL" => "Chile", "CM" => "Camerún", "CN" => "China", "CO" => "Colombia", "CR" => "Costa Rica", "CU" => "Cuba", "CV" => "Cabo Verde", "CX" => "Isla de Navidad", "CY" => "Chipre", "CZ" => "República Checa", "DE" => "Alemania", "DJ" => "Djibouti", "DK" => "Dinamarca", "DM" => "Dominica", "DO" => "República Dominicana", "DZ" => "Argelia", "EC" => "Ecuador", "EE" => "Estonia", "EG" => "Egipto", "EH" => "Sáhara Occidental", "ER" => "Eritrea", "ES" => "España", "ET" => "Etiopía", "FI" => "Finlandia", "FJ" => "Fiji", "FK" => "Islas Malvinas", "FM" => "Estados Federados de Micronesia", "FO" => "Islas Feroe", "FR" => "Francia", "GA" => "Gabón", "GB" => "Reino Unido", "GD" => "Granada", "GE" => "Georgia", "GF" => "Guayana Francesa" , "GG" => "Guernsey", "GH" => "Ghana", "GI" => "Gibraltar", "GL" => "Groenlandia", "GM" => "Gambia", "GN" => "Guinea", "GP" => "Guadeloupe", "GQ" => "Guinea Ecuatorial", "GR" => "Grecia", "GS" => "Georgia del Sur y las Islas Sandwich del Sur", "GT" => "Guatemala", "GU" => "Guam", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HK" => "Hong Kong", "HM" => "Islas Heard y McDonald", "HN" => "Honduras", "HR" => "Croacia", "HT" => "Haití", "HU" => "Hungría", "ID" => "Indonesia", "IE" => "Irlanda", "IL" => "Israel", "IM" => "Isla de Man", "IN" => "India", "IO" => "Territorio Británico del Océano Índico", "IQ" => "Iraq", "IR" => "Irán", "IS" => "Islandia", "IT" => "Italia", "JE" => "Jersey", "JM" => "Jamaica", "JO" => "Jordania", "JP" => "Japón", "KE" => "Kenia", "KG" => "Kirguistán", "KH" => "Camboya", "KI" => "Kiribati", "KM" => "Comoras", "KN" => "San Cristóbal y Nieves", "KP" => "Corea del Norte", "KR" => "Corea del Sur", "KW" => "Kuwait", "KY" => "Islas Caimán", "KZ" => "Kazajstán", "LA" => "Laos", "LB" => "Líbano", "LC" => "Santa Lucía", "LI" => "Liechtenstein", "LK" => "Sri Lanka", "LR" => "Liberia", "LS" => "Lesotho", "LT" => "Lituania", "LU" => "Luxemburgo", "LV" => "Letonia", "LY" => "Jamahiriya Árabe Libia", "MA" => "Marruecos", "MC" => "Mónaco", "MD" => "Moldavia", "ME" => "Montenegro", "MF" => "San Martín", "MG" => "Madagascar", "MH" => "Islas Marshall", "MK" => "Macedonia", "ML" => "Malí", "MM" => "Myanmar", "MN" => "Mongolia", "MO" => "Macao", "MP" => "Islas Marianas del Norte", "MQ" => "Martinica", "MR" => "Mauritania", "MS" => "Montserrat", "MT" => "Malta", "MU" => "Mauricio", "MV" => "Maldivas", "MW" => "Malawi", "MX" => "México", "MY" => "Malasia", "MZ" => "Mozambique", "NA" => "Namibia", "NC" => "Nueva Caledonia", "NE" => "Níger", "NF" => "Norfolk Island", "NG" => "Nigeria", "NI" => "Nicaragua", "NL" => "Países Bajos", "NO" => "Noruega", "NP" => "Nepal", "NR" => "Nauru", "NU" => "Niue", "NZ" => "Nueva Zelanda", "OM" => "Omán", "PA" => "Panamá", "PE" => "Perú", "PF" => "Polinesia Francesa", "PG" => "Papúa Nueva Guinea", "PH" => "Filipinas", "PK" => "Pakistán", "PL" => "Polonia", "PM" => "San Pedro y Miquelón", "PN" => "Islas Pitcairn", "PR" => "Puerto Rico", "PS" => "Territorio Palestino", "PT" => "Portugal", "PW" => "Palau", "PY" => "Paraguay", "QA" => "Qatar", "RE" => "Reunión", "RO" => "Rumanía", "RS" => "Serbia", "RU" => "Federación Rusa", "RW" => "Ruanda", "SA" => "Arabia Saudí", "SB" => "Islas Salomón", "SC" => "Seychelles", "SD" => "Sudán", "SE" => "Suecia", "SG" => "Singapur", "SH" => "Santa Helena", "SI" => "Eslovenia", "SJ" => "Svalbard y Jan Mayen", "SK" => "Eslovaquia", "SL" => "Sierra Leona", "SM" => "San Marino", "SN" => "Senegal", "SO" => "Somalia", "SR" => "Surinam", "ST" => "Santo Tomé y Príncipe", "SV" => "El Salvador", "SY" => "República Árabe Siria", "SZ" => "Swazilandia", "TC" => "Islas Turcas y Caicos", "TD" => "Chad", "TF" => "Tierras australes y antárticas francesas", "TG" => "Togo", "TH" => "Tailandia", "TJ" => "Tayikistán", "TK" => "Tokelau", "TL" => "Timor-Leste", "TM" => "Turkmenistán", "TN" => "Túnez", "TO" => "Tonga", "TR" => "Turquía", "TT" => "Trinidad y Tobago", "TV" => "Tuvalu", "TW" => "Taiwán", "TZ" => "Tanzania", "UA" => "Ucrania", "UG" => "Uganda", "UM" => "Islas Ultramarinas Menores de Estados Unidos", "US" => "Estados Unidos", "UY" => "Uruguay", "UZ" => "Uzbekistán", "VA" => "Vaticano", "VC" => "San Vicente y las Granadinas", "VE" => "Venezuela", "VG" => "Islas Vírgenes Británicas", "VI" => "Islas Vírgenes, U.S.", "VN" => "Viet Nam", "VU" => "Vanuatu", "WF" => "Wallis and Futuna", "WS" => "Samoa", "YE" => "Yemen", "YT" => "Mayotte", "ZA" => "Sudáfrica", "ZM" => "Zambia", "ZW" => "Zimbabwe", "XX" => "Indeterminado");
            return $iso_pais[$iso];
        }

    ?>
</body>
</html>
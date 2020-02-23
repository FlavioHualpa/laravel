<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Néstor Zadoff</title>

	<?php
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		if (!empty($_SERVER['HTTP_USER_AGENT'])) {
			echo $_SERVER['HTTP_USER_AGENT'] . '<br>';
		}
		$url = "http://api.ipstack.com/$ip?access_key=a2a17aa9edfcc9b0a5f7e7bc7a7d8898";
		$info = file_get_contents($url);
		if (preg_match_all("/\"(country_code)\":\"(\w\w)\"/", $info, $output_array) > 0)
		{
			$country = $output_array[2][0];
			$pais = Iso_a_Pais($country);
			echo "Pais: $pais<br>";
		}

		function Iso_a_Pais($iso)
		{
			$iso_pais = array("AC" => "Isla Ascensión", "AD" => "Andorra", "AE" => "Emiratos Árabes Unidos", "AF" => "Afganistán", "AG" => "Antigua y Barbuda", "AI" => "Anguila", "AL" => "Albania", "AM" => "Armenia", "AN" => "Antillas Neerlandesas", "AO" => "Angola", "AQ" => "Antártida", "AR" => "Argentina", "AS" => "Samoa Americana", "AT" => "Austria", "AU" => "Australia", "AW" => "Aruba" , "AX" => "Islas Aland", "AZ" => "Azerbaiyán", "BA" => "Bosnia y Herzegovina", "BB" => "Barbados", "BD" => "Bangladesh", "BE" => "Bélgica", "BF" => "Burkina Faso", "BG" => "Bulgaria", "BH" => "Bahrain", "BI" => "Burundi", "BJ" => "Benin", "BL" => "San Bartolomé", "BM" => "Bermuda", "BN" => "Brunéi", "BO" => "Bolivia", "BR" => "Brasil", "BS" => "Bahamas", "BT" => "Bhutan", "BV" => "Isla Bouvet", "BW" => "Botswana", "BY" => "Bielorrusia", "BZ" => "Belice", "CA" => "Canadá", "CC" => "Cocos (Keeling)", "CD" => "República Democrática del Congo", "CF" => "República Centroafricana", "CG" => "República del Congo", "CH" => "Suiza", "CI" => "Costa de Marfil", "CK" => "Islas Cook", "CL" => "Chile", "CM" => "Camerún", "CN" => "China", "CO" => "Colombia", "CR" => "Costa Rica", "CU" => "Cuba", "CV" => "Cabo Verde", "CX" => "Isla de Navidad", "CY" => "Chipre", "CZ" => "República Checa", "DE" => "Alemania", "DJ" => "Djibouti", "DK" => "Dinamarca", "DM" => "Dominica", "DO" => "República Dominicana", "DZ" => "Argelia", "CE" => "Ecuador", "EE" => "Estonia", "EG" => "Egipto", "EH" => "Sáhara Occidental", "ER" => "Eritrea", "ES" => "España", "ET" => "Etiopía", "FI" => "Finlandia", "FJ" => "Fiji", "FK" => "Islas Malvinas", "FM" => "Estados Federados de Micronesia", "FO" => "Islas Feroe", "FR" => "Francia", "GA" => "Gabón", "GB" => "Reino Unido", "GD" => "Granada", "GE" => "Georgia", "GF" => "Guayana Francesa" , "GG" => "Guernsey", "GH" => "Ghana", "GI" => "Gibraltar", "GL" => "Groenlandia", "GM" => "Gambia", "GN" => "Guinea", "GP" => "Guadeloupe", "GQ" => "Guinea Ecuatorial", "GR" => "Grecia", "GS" => "Georgia del Sur y las Islas Sandwich del Sur", "GT" => "Guatemala", "GU" => "Guam", "GW" => "Guinea-Bissau", "GY" => "Guyana", "HK" => "Hong Kong", "HM" => "Islas Heard y McDonald", "HN" => "Honduras", "HR" => "Croacia", "HT" => "Haití", "HU" => "Hungría", "ID" => "Indonesia", "IE" => "Irlanda", "IL" => "Israel", "IM" => "Isla de Man", "IN" => "India", "IO" => "Territorio Británico del Océano Índico", "IQ" => "Iraq", "IR" => "Irán", "IS" => "Islandia", "IT" => "Italia", "JE" => "Jersey", "JM" => "Jamaica", "JO" => "Jordania", "JP" => "Japón", "KE" => "Kenia", "KG" => "Kirguistán", "KH" => "Camboya", "KI" => "Kiribati", "KM" => "Comoras", "KN" => "San Cristóbal y Nieves", "KP" => "Corea del Norte", "KR" => "Corea del Sur", "KW" => "Kuwait", "KY" => "Islas Caimán", "KZ" => "Kazajstán", "LA" => "Laos", "LB" => "Líbano", "LC" => "Santa Lucía", "LI" => "Liechtenstein", "LK" => "Sri Lanka", "LR" => "Liberia", "LS" => "Lesotho", "LT" => "Lituania", "LU" => "Luxemburgo", "LV" => "Letonia", "LY" => "Jamahiriya Árabe Libia", "MA" => "Marruecos", "MC" => "Mónaco", "MD" => "Moldavia", "ME" => "Montenegro", "MF" => "San Martín", "MG" => "Madagascar", "MH" => "Islas Marshall", "MK" => "Macedonia", "ML" => "Malí", "MM" => "Myanmar", "MN" => "Mongolia", "MO" => "Macao", "MP" => "Islas Marianas del Norte", "MQ" => "Martinica", "MR" => "Mauritania", "MS" => "Montserrat", "MT" => "Malta", "MU" => "Mauricio", "MV" => "Maldivas", "MW" => "Malawi", "MX" => "México", "MY" => "Malasia", "MZ" => "Mozambique", "NA" => "Namibia", "NC" => "Nueva Caledonia", "NE" => "Níger", "NF" => "Norfolk Island", "NG" => "Nigeria", "NI" => "Nicaragua", "NL" => "Países Bajos", "NO" => "Noruega", "NP" => "Nepal", "NR" => "Nauru", "NU" => "Niue", "NZ" => "Nueva Zelanda", "OM" => "Omán", "PA" => "Panamá", "PE" => "Perú", "PF" => "Polinesia Francesa", "PG" => "Papúa Nueva Guinea", "PH" => "Filipinas", "PK" => "Pakistán", "PL" => "Polonia", "PM" => "San Pedro y Miquelón", "PN" => "Islas Pitcairn", "PR" => "Puerto Rico", "PS" => "Territorio Palestino", "PT" => "Portugal", "PW" => "Palau", "PY" => "Paraguay", "QA" => "Qatar", "RE" => "Reunión", "RO" => "Rumanía", "RS" => "Serbia", "RU" => "Federación Rusa", "RW" => "Ruanda", "SA" => "Arabia Saudí", "SB" => "Islas Salomón", "SC" => "Seychelles", "SD" => "Sudán", "SE" => "Suecia", "SG" => "Singapur", "SH" => "Santa Helena", "SI" => "Eslovenia", "SJ" => "Svalbard y Jan Mayen", "SK" => "Eslovaquia", "SL" => "Sierra Leona", "SM" => "San Marino", "SN" => "Senegal", "SO" => "Somalia", "SR" => "Surinam", "ST" => "Santo Tomé y Príncipe", "SV" => "El Salvador", "SY" => "República Árabe Siria", "SZ" => "Swazilandia", "TC" => "Islas Turcas y Caicos", "TD" => "Chad", "TF" => "Tierras australes y antárticas francesas", "TG" => "Togo", "TH" => "Tailandia", "TJ" => "Tayikistán", "TK" => "Tokelau", "TL" => "Timor-Leste", "TM" => "Turkmenistán", "TN" => "Túnez", "TO" => "Tonga", "TR" => "Turquía", "TT" => "Trinidad y Tobago", "TV" => "Tuvalu", "TW" => "Taiwán", "TZ" => "Tanzania", "UA" => "Ucrania", "UG" => "Uganda", "UM" => "Islas Ultramarinas Menores de Estados Unidos", "US" => "Estados Unidos", "UY" => "Uruguay", "UZ" => "Uzbekistán", "VA" => "Vaticano", "VC" => "San Vicente y las Granadinas", "VE" => "Venezuela", "VG" => "Islas Vírgenes Británicas", "VI" => "Islas Vírgenes, U.S.", "VN" => "Viet Nam", "VU" => "Vanuatu", "WF" => "Wallis and Futuna", "WS" => "Samoa", "YE" => "Yemen", "YT" => "Mayotte", "ZA" => "Sudáfrica", "ZM" => "Zambia", "ZW" => "Zimbabwe", "XX" => "Indeterminado");
			return $iso_pais[$iso];
		}
	?>

	</head>

	<body>
	</body>
</html>
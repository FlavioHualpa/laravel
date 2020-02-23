<?php

require_once 'persona.php';
require_once 'pyme.php';
require_once 'multinacional.php';
require_once 'classic.php';
require_once 'gold.php';
require_once 'platinum.php';
require_once 'black.php';

$persona = new Persona('Flavio', 'Hualpa', 22651477, new DateTime('1972-03-05'), 'fh@gmail.com', 'mypass');

$pyme = new Pyme('Garante Hnos. S.A.', '30-59822564-5', 'ghsa@mail.com', 'tandil28');

$multi = new Multinacional('Garante Hnos. S.A.', '30-59822564-5', 'ghsa@mail.com', 'tandil28');

$fecha = new DateTime(null, new DateTimeZone('America/Argentina/Buenos_Aires'));

$classic = new CuentaClassic('0112233445566778899888');
$gold = new CuentaGold('0112233445566778899888');
$plat = new CuentaPlatinum('0112233445566778899888');
$black = new CuentaBlack('0112233445566778899888');

$classic->acreditar(2300);
$classic->debitar(500, CUENTA::MEDIO_RED_LINK);
$gold->acreditar(2300);
$gold->debitar(500, CUENTA::MEDIO_RED_LINK);
$plat->acreditar(2300);
$plat->debitar(500, CUENTA::MEDIO_RED_LINK);
$black->acreditar(2300);
$black->debitar(500, CUENTA::MEDIO_RED_LINK);

var_dump($persona, $pyme, $multi, $fecha);
var_dump($classic, $gold, $plat, $black);

<?php

$traducciones = [

  'esp' => include 'español.php',
  'ing' => include 'ingles.php',
  'fra' => include 'frances.php',
  
];

var_dump($traducciones);

echo $traducciones['fra']['key.3'];
echo '<br>';
echo $traducciones['ing']['key.3'];
echo '<br>';

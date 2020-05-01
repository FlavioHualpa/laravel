<?php

$datos = file_get_contents('data\count.txt');

$split = array_transform(
   
   function ($el) {
      return explode(":", $el);
   },
   
   explode("\r\n", $datos)
   
);

if (isset($_POST['key']))
{
   $key = $_POST['key'];
   $split[$key][1]++;
   echo $split[$key] ? json_encode($split[$key]) : null;
}

echo null;


//******************************/
//  Funciones de soporte
//******************************/

function array_transform($callback, $array)
{
   $l = count($array);
   $result = [];
   
   for ($i = 0; $i < $l; $i++) {
      $data = $callback($array[$i]);
      $key = array_shift($data);
      $result[$key] = $data;
   }
   
   return $result;
}

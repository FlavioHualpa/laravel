<?php

// Si la IP del contactante es la de un spammer
// bloqueamos el acceso al formulario de contacto
// redirigiéndolo a la página de inicio

$blackList = [
   '95.161.221.176',
   '128.70.76.32',
   '185.119.0.95',
   '85.249.71.83',
   '193.124.114.203',
   '40.77.167.105',
   '186.177.105.146',
   '92.118.77.10',
   '117.54.112.155',
   '181.231.129.203'
];

if (isset($_SERVER['HTTP_CLIENT_IP'])
   && array_search($_SERVER['HTTP_CLIENT_IP'], $blackList) !== false
   || $_SERVER['REMOTE_ADDR']
   && array_search($_SERVER['REMOTE_ADDR'], $blackList) !== false)
   {
      header('location: ../index.php');
      exit;
   }

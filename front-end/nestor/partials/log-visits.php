<?php

require_once 'src\Counter.php';
require_once 'src\Visit.php';

$source = new MySql();

$counter = new Counter($source);

$visits = $counter->find(1)['numero'];

if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
    $ip = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
}
else
{
    $ip = $_SERVER['REMOTE_ADDR'];
}

$visit = new Visit($source);

$lastVisit = $visit->last($ip);

$timezone = new DateTimeZone('America/Buenos_Aires');

if (empty($lastVisit))
{
   $minutes = 60;
}
else
{
   $date1 = date_create("now", $timezone);
   $date2 = date_create($lastVisit['fecha'], $timezone);

   $diff = date_diff($date1, $date2);

   $minutes = $diff->i +  // minutos
      $diff->h * 60 +  // horas
      $diff->d * 24 * 60 +  // dias
      $diff->m * 30 * 24 * 60 +  //meses
      $diff->y * 12 * 30 * 24 * 60;  // años
}

if ($minutes >= 15) {
   $counter->increment(1);   // el counter con id = 1 es el de visitas
   $visits++;
}

$visit->ip = $ip;
$visit->created_at = date_create('now', $timezone)->format('Y-m-d H:i:s');
$visit->url = $_SERVER['REQUEST_URI'];

$visit->save();

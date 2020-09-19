<?php

require 'geoapi.php';
require_once 'File.php';
require_once 'Download.php';

$source = new MySql();

$file = new File($source);

$result = $file->find($id);

if (empty($result)) {
   header('location:/error/404f.php');
   exit();
}

$file->increment($id);

$download = new Download($source);
$now = new DateTime(null, new DateTimeZone('America/Buenos_Aires'));

$download->pdf_id = $id;
$download->ip = $ip;
$download->country = $country;
$download->city = $city;
$download->created_at = $now->format('Y-m-d H:i:s');
$download->save();

// echo $result['nombre_pdf'];
// echo '<br>';
// echo $country;
// echo '<br>';
// echo $city;

header("location:../pdfs/" . utf8_encode($result['nombre_pdf']));
exit();
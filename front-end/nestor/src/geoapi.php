<?php

if (! isset($_GET['id'])) {
   header('location:/error/404f.php');
}

$id = $_GET['id'];

if (! empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ip = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}

$api_key = 'a2a17aa9edfcc9b0a5f7e7bc7a7d8898';
$url = "http://api.ipstack.com/$ip?access_key=$api_key";
$info = json_decode(file_get_contents($url), true);
$country = $info['country_code'];
$city = $info['city'];

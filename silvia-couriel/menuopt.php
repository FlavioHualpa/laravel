<?php

$titles = [
  'sculpt' => 'main.formats.1',
  'small' => 'main.formats.2',
  'drawings' => 'main.formats.3',
  'curric' => 'main.info.1',
  'exhib' => 'main.info.2',
  'contact' => 'main.info.3',
  'mailsent' => 'main.info.3',
  'home' => 'main.home',
  'visits' => 'main.visits',
];

$includes = [
  'sculpt' => 'inc/gallery.php',
  'small' => 'inc/gallery.php',
  'drawings' => 'inc/gallery.php',
  'curric' => 'inc/curriculum.php',
  'contact' => 'inc/contact.php',
  'mailsent' => 'inc/messagesent.php',
];

$styles = [
  'sculpt' => '',
  'small' => '',
  'drawings' => '',
  'curric' => 'css/curric.css',
  'contact' => 'css/contact.css',
  'mailsent' => 'css/contact.css',
];

$galleries = [
  'sculpt' => 'json/sculptures.json',
  'small' => 'json/small.json',
  'drawings' => 'json/drawings.json',
  'curric' => 'json/empty.json',
  'contact' => 'json/empty.json',
  'mailsent' => 'json/empty.json',
];

$section = isset($_GET['menu']) && isset($titles[$_GET['menu']]) ?
  $_GET['menu'] :
  'sculpt';

$title = $titles[$section];

$gallery_file = $galleries[$section];
$gallery_json = file_get_contents($gallery_file);

$gallery = json_decode(
  $gallery_json,
  true
);

for ($i = 0; $i < count($gallery); $i++) {
  $gallery[$i]['title'] = lang($gallery[$i]['title_key']);
  $gallery[$i]['features'] = lang($gallery[$i]['features_key']);
}

$counter_json = file_get_contents('json/counter.json');
$counter_array = json_decode(
  $counter_json,
  true
);

// solo incremento el contador de visitas si
// la ip del visitante es distinta a la anterior

if (empty($_SESSION['user-ip']) || $_SESSION['user-ip'] != $_SERVER['REMOTE_ADDR'])
{
  $counter_array['visits']++;
  $counter_json = json_encode($counter_array);
  file_put_contents('json/counter.json', $counter_json);
  $_SESSION['user-ip'] = $_SERVER['REMOTE_ADDR'];
}

$visits = $counter_array['visits'];

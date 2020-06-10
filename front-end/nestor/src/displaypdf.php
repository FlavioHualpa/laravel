<?php

require 'params.php';

try
{
   $pdo = new PDO($dsn, $user, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $sql = 'SELECT id, nombre_pdf FROM pdfs WHERE id = :id';
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam('id', $id, PDO::PARAM_STR);
   $stmt->execute();

   $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch (Exception $e)
{
   header('location:/error/500.php');
   exit();
}

if (empty($result)) {
   header('location:/error/404f.php');
   exit();
}

echo $result['nombre_pdf'];
echo '<br>';
echo $country;
echo '<br>';
echo $city;

// header("location:../../NestorZadoff/pdfs/" . $result['nombre_pdf']);
//header('location:file://C:/wamp64/www/sites/NestorZadoff/pdfs/' . $result['nombre_pdf']);
exit();
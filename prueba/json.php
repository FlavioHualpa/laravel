<?php

   $usuario = [
      "nombre" => "flavio",
      "apellido" => "hualpa",
      "email" => "fh@gmail.com"
   ];

   $usuarios = [
      [
         "nombre" => "flavio",
         "apellido" => "hualpa",
         "emails" =>  [
            "M1" => "fh@gmail.com",
            "M2" => "fh@outlook.com",
            "M3" => "fh@fibertel.com.ar"
         ],
      ],
      [
         "nombre" => "juan",
         "apellido" => "lopez",
         "emails" =>  [
            "jl@gmail.com",
            "jl@outlook.com",
            "jl@fibertel.com.ar"
         ],
      ],
   ];

   $json = json_encode($usuarios, JSON_PRETTY_PRINT);
   $array = json_decode($json, true);
   var_dump($array);

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
   <style>
      * { font-size: 48px; }
   </style>
</head>
<body>
   
</body>
</html>
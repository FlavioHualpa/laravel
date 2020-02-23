<?php

$persona = [
    "nombre" => "Jon",
    "apellido" => "Sand",
    "edad" => 27,
    "hobbies" => [
        "Netflix",
        "Fútbol",
        "Programar"
    ]
];

$persona["edad"] = 25;
$persona["direccion"] = "Winterhome";
$persona["hobbies"][] = "Ajedrez";

$valor1 = 31;
$valor2 = 18;
$mensajeComp = "Entre los números $valor1 y $valor2 el mayor es ";
if ($valor1 > $valor2) {
    $mensajeComp .= $valor1;
} else {
    $mensajeComp .= $valor2;
}

$aleat = rand(1, 5);
if ($aleat != 3) {
    $mensajeAleat = "El número aleatorio no fue un 3";
} else {
    $mensajeAleat = "Repetimos, el número aleatorio fue un $aleat";
}

$aleat = rand(1, 100);
$mensajeSigAleat =  "";
if ($aleat > 50) {
    $mensajeSigAleat = "Fue mayor a 50";
} else {
    $mensajeSigAleat = "Fue menor a 50";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prueba de PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container bg-light">
        <h2><?= $mensajeComp ?></h2>
        <h2>
            <?php
            if ($aleat == 3 || $aleat == 5) {
                echo "El número aleatorio acertó un $aleat";
            }
            ?>
        </h2>
        <h2><?= $mensajeAleat ?></h2>
        <h2>
            Siguiente aleatorio:<br>
            <?= $mensajeSigAleat ?>
        </h2>
    </div>
</body>
</html>
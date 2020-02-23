<?php

/*  3  */
$contador = 1;
while ($contador < 6) {
    echo $contador * 2;
    echo ' - ';
    $contador++;
}

echo '<hr>';

/*  4  */
$tiros = 0;
$caras = 0;

while ($caras < 5) {
    $tiro = rand(0, 1);
    if ($tiro == 1) {
        $caras++;
    }
    $tiros++;
}

echo 'Tuve que lanzar la moneda ' . $tiros . ' veces para sacar ' . $caras . ' veces cara.';
echo '<hr>';

/*  5  */
$nombres = [
    "Paula",
    "José",
    "María",
    "Roberto",
    "Nina",
];

for ($i=0; $i < count($nombres); $i++) {
    echo $nombres[$i] . ", ";
}

echo '<br>';

$i = 0;
while ($i < count($nombres)) {
    echo $nombres[$i] . ", ";
    $i++;
}

echo '<br>';

$i = 0;
do {
    echo $nombres[$i] . ", ";
    $i++;
} while ($i < count($nombres));

echo '<br>';

foreach ($nombres as $nombre) {
    echo $nombre . ", ";
}

echo '<br>';
echo '<hr>';

/*  6  */
$numeros = [];

for ($i=0; $i < 10; $i++) {
    $numeros[] = rand(0, 10);
}

foreach ($numeros as $num) {
    if ($num == 5) {
        echo 'Se encontró un 5!';
        break;
    } else {
        echo $num . ', ';
    }
}

echo '<br>';
echo '<hr>';

/*  7  */
$numeros = [];

for ($i=0; $i < 10; $i++) {
    $numeros[] = rand(0, 100);
}

$pares = 0;

foreach ($numeros as $num) {
    if ($num % 2 == 0) {
        $pares++;
    }
}

echo $pares . ' números son pares.';
echo '<hr>';

/*  8  */
$mascota = [
    "animal" => "Ardilla",
    "edad" => 15,
    "altura" => 22,
    "nombre" => "Scott",
];

foreach ($mascota as $key => $value) {
    echo $key . ': ' . $value . '<br>';
}
echo '<hr>';

/*  9  */
$ceu = array( "Italia"=>"Roma", "Luxembourg"=>"Luxembourg", "Bélgica"=>"Bruselas",
    "Dinamarca"=>"Copenhagen", "Finlandia"=>"Helsinki", "Francia" =>
    "Paris", "Slovakia"=>"Bratislava", "Eslovenia"=>"Ljubljana", "Alemania" => "Berlin",
    "Grecia" => "Athenas", "Irlanda"=>"Dublin", "Holanda"=>"Amsterdam",
    "Portugal"=>"Lisbon", "España"=>"Madrid", "Suecia"=>"Stockholm", "Reino
    Unido"=>"London", "Chipre"=>"Nicosia", "Lithuania"=>"Vilnius", "Republica
    Checa"=>"Prague", "Estonia"=>"Tallin", "Hungría"=>"Budapest", "Latvia"=>"Riga",
    "Malta"=>"Valletta", "Austria" => "Vienna", "Polonia"=>"Warsaw");

foreach ($ceu as $key => $value) {
    echo 'La capital de ' . $key . ' es ' . $value . '<br>';
}
echo '<hr>';

/*  10a  */
$ceu = [
    "Argentina" => ["Buenos Aires", "Córdoba", "Santa Fé"],
    "Brasil" => ["Brasilia", "Rio de Janeiro", "Sao Pablo"],
    "Colombia" => ["Cartagena", "Bogota", "Barranquilla"],
    "Francia" => ["Paris", "Nantes", "Lyon"],
    "Italia" => ["Roma", "Milan", "Venecia"],
    "Alemania" => ["Munich", "Berlin", "Frankfurt"]
];

foreach ($ceu as $key => $value) :
    echo "Las ciudades de " . $key . " son:"; ?>
    <ul>
        <?php foreach ($value as $ciudad) : ?>
            <li><?=$ciudad?></li>
        <?php endforeach ?>
    </ul>
<?php endforeach;

echo '<hr>';

/*  10b  */
$ceu = [
    "Argentina" => [
        "ciudades" => ["Buenos Aires", "Córdoba", "Santa Fé"],
        "esAmericano" => true,
    ],
    "Brasil" => [
        "ciudades" => ["Brasilia", "Rio de Janeiro", "Sao Pablo"],
        "esAmericano" => true,
    ],
    "Colombia" => [
        "ciudades" => ["Cartagena", "Bogota", "Barranquilla"],
        "esAmericano" => true,
    ],
    "Francia" => [
        "ciudades" => ["Paris", "Nantes", "Lyon"],
        "esAmericano" => false,
    ],
    "Italia" => [
        "ciudades" => ["Roma", "Milan", "Venecia"],
        "esAmericano" => false,
    ],
    "Alemania" => [
        "ciudades" => ["Munich", "Berlin", "Frankfurt"],
        "esAmericano" => false,
    ],
];

foreach ($ceu as $key => $value) :
    if ($value["esAmericano"]) :
        echo "Las ciudades de " . $key . " son:"; ?>
        <ul>
            <?php foreach ($value["ciudades"] as $ciudad) : ?>
                <li><?=$ciudad?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
<?php endforeach;

echo '<hr>';

/*  11  */
$a = 3;
$b = "Alvarez Thomas";
$c = true;
$arr = [ $a, $b, $c ];
var_dump($arr);

<?php

require_once 'usuarios.php';
require_once 'usuario.php';
require_once 'celular.php';
require_once 'habilidad.php';

$usuario = new Usuario('flavio', 'fla@speedy.com', 'dragones');
$usuario2 = new Usuario('marisa', 'marisa@sion.com', 'balizas');

$celu1 = new Celular('Motorola', 'G7 plus', 'Personal', '011 3329-1839');
$celu2 = new Celular('Apple', 'iPhone 8', 'Claro', '011 6920-4642');

$usuario->setCelular($celu1);
$usuario2->setCelular($celu2);

$usuario->agregarHabilidad('Tocar el piano', 2);
$usuario->agregarHabilidad('Hablar Alemán', 2);
$usuario->agregarHabilidad('Programar sitios web', 3);

$usuario2->agregarHabilidad('Hacer Parkur', 4);
$usuario2->agregarHabilidad('Jugar al Ping Pong', 3);
$usuario2->agregarHabilidad('Cocinar', 5);

var_dump($usuario);
var_dump($usuario2);

echo $usuario->saludar();
echo '<br>';
echo $usuario->mostrarCelular();
echo '<br>';
echo $usuario2->saludar();
echo '<br>';
echo $usuario2->mostrarCelular();
echo '<br>';
echo '<br>';
echo 'Usuario 1 llamó a Usuario 2 por 307 segundos. El costo de la llamada es de $' . $usuario->llamar($usuario2, 307);

$usuario->guardar();
$usuario->guardar();
$usuario2->guardar();
$usuario2->guardar();

Usuarios::logStorage();

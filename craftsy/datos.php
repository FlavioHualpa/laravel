<?php

$productos = [
  [
    "nombre" => "Nombre del Producto",
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "imagen" => "img-phone-01.jpg",
    "precio" => 150,
    "enOferta" => true,
  ],
  [
    "nombre" => "Nombre del Producto",
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "imagen" => "img-phone-02.jpg",
    "precio" => 150,
    "enOferta" => false,
  ],
  [
    "nombre" => "Nombre del Producto",
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "imagen" => "img-phone-03.jpg",
    "precio" => 150,
    "enOferta" => true,
  ],
  [
    "nombre" => "Nombre del Producto",
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "imagen" => "img-phone-01.jpg",
    "precio" => 150,
    "enOferta" => true,
  ],
  [
    "nombre" => "Nombre del Producto",
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "imagen" => "img-phone-02.jpg",
    "precio" => 150,
    "enOferta" => false,
  ],
  [
    "nombre" => "Nombre del Producto",
    "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.",
    "imagen" => "img-phone-03.jpg",
    "precio" => 150,
    "enOferta" => false,
  ],
];

function descripcion_larga($prod) {
  $precio = '$ ' . ($prod['enOferta'] ? $prod['precio'] * 0.8 : $prod['precio']);
  return $prod['descripcion'] . '  ' . $precio;
}

function precio_final($prod) {
  $precio = '$ ' . ($prod['enOferta'] ? $prod['precio'] * 0.8 : $prod['precio']);
  return $precio;
}

?>

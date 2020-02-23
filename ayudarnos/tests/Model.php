<?php

class Model
{
   protected $fields = [
      'nombre' => 'Clara',
      'apellido' => 'Antúnez',
      'dni' => 29988316,
      'nacimiento' => '1994-07-03',
      'nacionalidad' => 'Argentina'
   ];

   public function __get($name) {
      return isset($this->fields[$name]) ? $this->fields[$name] : 'null';
   }
}
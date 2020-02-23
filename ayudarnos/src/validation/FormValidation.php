<?php

require 'FormField.php';

class FormValidation
{
   private $expected_fields;
   private $valores_pasados;
   private $errores;

   public function __construct()
   {
      $this->expected_fields = [];
      $this->valores_pasados = [];
      $this->errores = [];
   }

   public function agregarValidacion(FormField $campo)
   {
      $campo->setFormValidator($this);
      $this->expected_fields[] = $campo;
   }

   public function getError(string $campo) : ?string
   {
      return $this->errores[$campo] ?? null;
   }

   public function getErrores() : array
   {
      return $this->errores;
   }

   public function getValor(string $campo) : ?string
   {
      return $this->valores_pasados[$campo] ?? null;
   }

   public function getArray(string $campo) : ?array
   {
      return $this->valores_pasados[$campo] ?? null;
   }

   public function sinErrores() : bool
   {
      return empty($this->errores);
   }

   public function validar($valores)
   {
      $this->valores_pasados = $valores;
      $this->errores = [];

      if ($valores) {

         foreach ($this->expected_fields as $expected) {

            $nombre = $expected->getNombre();
            $mensaje = $expected->getMensaje();

            if (isset($valores[$nombre])) {

               $dato = $expected instanceof FileFormField ? $valores[$nombre]['name'] : trim($valores[$nombre]);

               $error = $expected->validar($dato);
               if ($error) {
                  $this->errores[$nombre] = $error;
               }
            }
            else {
               if ($expected instanceof OptionsFormField) {
                  $this->errores[$nombre] = $mensaje ? $mensaje : 'Debe seleccionar un valor';
               }
               else {
                  $this->errores[$nombre] = 'Error de programación. No se recibió el valor de este campo.';
               }
            }
         }
      }
   }
}

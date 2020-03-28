<?php

function available_languages()
{
   return [
      'es' => 'esp.php',
      'en' => 'eng.php',
      'fr' => 'fra.php',
   ];
}

function get_language()
{
   return isset($_COOKIE['user-lang']) ? $_COOKIE['user-lang'] : 'es';
}

function lang($key) : string
{
   $lang = get_language();
   $available = available_languages();

   if (isset($available[$lang]))
   {
      $translations_file = $available[$lang];
      $translations = require $translations_file;
      if (isset($translations[$key]))
         return $translations[$key];
   }

   return $key;
}

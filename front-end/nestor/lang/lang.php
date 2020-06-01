<?php

$translations = get_translations();

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

function set_language($language)
{
   $available = available_languages();
   $setLang = 'es';

   if (isset($available[$language])) {
      $setLang = $language;
   }

   setcookie('user-lang', $language, time() + 60*60*24*30, "/");
}

function get_translations()
{
   $lang = get_language();
   $available = available_languages();

   if (isset($available[$lang]))
   {
      $translations_file = $available[$lang];
      $translations = require $translations_file;
   }

   return $translations;
}

function lang($key)
{
   global $translations;
   
   return isset($translations[$key]) ? $translations[$key] : $key;
}

/*
function lang($key)
{
    $lang = get_language();
    $available = available_languages();

    if (isset($available[$lang])) {
        $translations_file = $available[$lang];
        $translations = require $translations_file;
        if (isset($translations[$key])) {
            return $translations[$key];
        }

    }

    return $key;
}
*/
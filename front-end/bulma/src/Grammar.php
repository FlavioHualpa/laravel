<?php

class Grammar
{
   public static function plural($singular)
   {
      $special = [
         
         "fez" => "fezzes",
         "gas" => "gasses",
         "roof" => "roofs",
         "bilief" => "biliefs",
         "chef" => "chefs",
         "chief" => "chiefs",
         "ray" => "rays",
         "boy" => "boys",
         "toy" => "toys",
         "photo" => "photos",
         "piano" => "pianos",
         "halo" => "halos",
         "species" => "species",
         "deer" => "deer",
         "fish" => "fish",
         "sheep" => "sheep",
         "child" => "children",
         "goose" => "geese",
         "man" => "men",
         "woman" => "women",
         "foot" => "feet",
         "tooth" => "teeth",
         "person" => "people",
         
      ];
      
      if (isset($special[$singular]))
         return $special[$singular];
      
      if (static::endsWith($singular, [ "s", "sh", "ch", "o", "x", "z" ]))
         return $singular . "es";
      
      if (static::endsWith($singular, [ "f" ]))
         return substr($singular, 0, -1) . "ves";
      
      if (static::endsWith($singular, [ "fe" ]))
         return substr($singular, 0, -2) . "ves";
      
      if (static::endsWith($singular, [ "y" ]))
         return substr($singular, 0, -1) . "ies";
      
      if (static::endsWith($singular, [ "us" ]))
         return substr($singular, 0, -2) . "i";
      
      if (static::endsWith($singular, [ "is" ]))
         return substr($singular, 0, -2) . "es";
      
      if (static::endsWith($singular, [ "on" ]))
         return substr($singular, 0, -2) . "a";
      
      return $singular . "s";
   }
   
   private static function endsWith($word, $endings)
   {
      foreach ($endings as $ending)
         if (substr($word, -strlen($ending)) == $ending)
            return $ending;
      
      return false;
   }
   
   public static function classToTableName($className)
   {
      $wordCount = preg_match_all("/[A-Z]+[0-9a-z]+/", $className, $matches);
      $tableName = "";

      for ($i = 0; $i < $wordCount; $i++)
         $tableName .= ($i > 0 ? "_" : "")
            . ($i == $wordCount - 1
               ? self::plural(strtolower($matches[0][$i]))
               : strtolower($matches[0][$i])
            );

      return $tableName;
   }
}

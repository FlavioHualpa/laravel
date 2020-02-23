<?php

namespace App;

class CustomRules
{
   public static function isValidCUIT($attribute, $value, $fail)
   {
      function control_digit_ok($value)
      {
         $multipliers = [ 2, 3, 4, 5, 6, 7 ];
         $pos = strlen($value) - 1;
         $last_digit = ord($value[$pos]) - ord("0");
         
         $pos -= 2;
         $sum = 0;
         $m = 0;
         
         while ($pos >= 0)
         {
            if ($value[$pos] != "-")
            {
               $digit = ord($value[$pos]) - ord("0");
               $digit *= $multipliers[$m];
               $sum += $digit;
               $m = ($m + 1) % 6;
            }
            $pos--;
         }
         
         $sum %= 11;
         $check = 11 - $sum;
         if ($check == 11) $check = 0;
         
         return $check == $last_digit;
      }
      
      if (strlen($value) != 13)
      $fail('El CUIT debe tener 13 caracteres. Solo dígitos y guiones.');
      
      elseif (! control_digit_ok($value))
      $fail('El CUIT ingresado es inválido');
   }
}

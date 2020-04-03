<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TotalAppliedRule implements Rule
{
   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct()
   {
      //
   }
   
   /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
   public function passes($attribute, $value)
   {
      $lines = request('item');
      $total = 0.0;

      foreach ($lines as $line) {
         $total += $line['amount'];
      }

      return $value <= $total;
   }
   
   /**
   * Get the validation error message.
   *
   * @return string
   */
   public function message()
   {
      return 'No puedes aplicar más que el total restante';
   }
}

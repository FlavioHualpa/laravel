<?php

namespace App\Rules;

use App\Condition;
use Illuminate\Contracts\Validation\Rule;

class ConditionCodeUniqueRule implements Rule
{
   private $condition;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(Condition $condition = null)
   {
      $this->condition = $condition;
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
      $account_id = auth('admin')->id();

      return ! Condition::where('code', $value)
                        ->where('account_id', $account_id)
                        ->when($this->condition, function($query) {
                           return $query->where('id', '!=', $this->condition->id);
                        })
                        ->exists();
   }
   
   /**
   * Get the validation error message.
   *
   * @return string
   */
   public function message()
   {
      return 'Ese código ya existe';
   }
}

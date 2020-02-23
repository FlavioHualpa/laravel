<?php

namespace App\Rules;

use App\State;
use Illuminate\Contracts\Validation\Rule;

class StateCodeUniqueRule implements Rule
{
   private $state;
   
   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(State $state = null)
   {
      $this->state = $state;
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

      return ! State::where('code', $value)
                     ->where('account_id', $account_id)
                     ->when($this->state, function($query) {
                        return $query->where('id', '!=', $this->state->id);
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

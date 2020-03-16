<?php

namespace App\Rules;

use App\Bank;
use Illuminate\Contracts\Validation\Rule;

class BankCodeUniqueRule implements Rule
{
   private $bank;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(Bank $bank = null)
   {
      $this->bank = $bank;
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
      $account_id = auth()->user()->account->id;

      return ! Bank::where('code', $value)
                  ->where('account_id', $account_id)
                  ->when($this->bank, function($query) {
                     return $query->where('id', '!=', $this->bank->id);
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
      return 'Ese código ya está en uso';
   }
}

<?php

namespace App\Rules;

use App\BankAccount;
use Illuminate\Contracts\Validation\Rule;

class BankAccountCodeUniqueRule implements Rule
{
   private $bankAccount;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(BankAccount $bankAccount = null)
   {
      $this->bankAccount = $bankAccount;
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
      $company_id = session('active_company')->id;

      return ! BankAccount::where('code', $value)
                           ->where('company_id', $company_id)
                           ->when($this->bankAccount, function($query) {
                              return $query->where('id', '!=', $this->bankAccount->id);
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

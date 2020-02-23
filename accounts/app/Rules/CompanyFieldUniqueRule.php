<?php

namespace App\Rules;

use App\Company;
use Illuminate\Contracts\Validation\Rule;

class CompanyFieldUniqueRule implements Rule
{
   private $unique_field;
   private $company;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct($unique_field, Company $company = null)
   {
      $this->unique_field = $unique_field;
      $this->company = $company;
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

      return ! Company::where($this->unique_field, $value)
                        ->where('account_id', $account_id)
                        ->when($this->company, function($query) {
                           return $query->where('id', '!=', $this->company->id);
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
      switch ($this->unique_field)
      {
         case 'code':
            return 'Ese código ya existe';

         case 'fiscal_id':
            return 'Ese CUIT ya fue ingresado';
      }
   }
}

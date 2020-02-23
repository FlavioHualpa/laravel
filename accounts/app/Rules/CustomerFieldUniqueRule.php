<?php

namespace App\Rules;

use App\Customer;
use Illuminate\Contracts\Validation\Rule;

class CustomerFieldUniqueRule implements Rule
{
   private $unique_field;
   private $customer;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct($unique_field, Customer $customer = null)
   {
      $this->unique_field = $unique_field;
      $this->customer = $customer;
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

      return ! Customer::where($this->unique_field, $value)
                        ->where('company_id', $company_id)
                        ->when($this->customer, function($query) {
                           return $query->where('id', '!=', $this->customer->id);
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
            return 'Ese CUIT ya está registrado';
      }
   }
}

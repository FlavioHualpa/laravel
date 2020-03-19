<?php

namespace App\Rules;

use App\PriceList;
use Illuminate\Contracts\Validation\Rule;

class PriceListCodeUniqueRule implements Rule
{
   private $price_list;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(PriceList $price_list = null)
   {
      $this->price_list = $price_list;
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

      return ! PriceList::where('code', $value)
                        ->where('company_id', $company_id)
                        ->when($this->price_list, function($query) {
                           return $query->where('id', '!=', $this->price_list->id);
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

<?php

namespace App\Rules;

use App\Product;
use Illuminate\Contracts\Validation\Rule;

class ProductCodeUniqueRule implements Rule
{
   private $product;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(Product $product)
   {
      $this->product = $product;
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

      return ! Product::where('code', $value)
                        ->where('company_id', $company_id)
                        ->when($this->product, function($query) {
                           return $query->where('id', '!=', $this->product->id);
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

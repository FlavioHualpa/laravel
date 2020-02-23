<?php

namespace App\Rules;

use App\Transport;
use Illuminate\Contracts\Validation\Rule;

class TransportCodeUniqueRule implements Rule
{
   private $transport;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(Transport $transport = null)
   {
      $this->transport = $transport;
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

      return ! Transport::where('code', $value)
                     ->where('account_id', $account_id)
                     ->when($this->transport, function($query) {
                        return $query->where('id', '!=', $this->transport->id);
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

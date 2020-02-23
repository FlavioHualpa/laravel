<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class UserEmailUniqueRule implements Rule
{
   private $user;

   /**
   * Create a new rule instance.
   *
   * @return void
   */
   public function __construct(User $user = null)
   {
      $this->user = $user;
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

      return ! User::where('email', $value)
                     ->where('account_id', $account_id)
                     ->when($this->user, function($query) {
                        return $query->where('id', '!=', $this->user->id);
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
      return 'Ese email ya está registrado';
   }
}

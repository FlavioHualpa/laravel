<?php

namespace App\Http\Requests;

use App\Rules\UserEmailUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
   /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
   public function authorize()
   {
      return true;
   }
   
   /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
   public function rules()
   {
      return [
         'name' => 'required',
         'email' => [
            'required',
            'email',
            new UserEmailUniqueRule
         ],
         'password' => 'required|min:6|confirmed'
      ];
   }

   public function messages()
   {
      return [
         'name.required' => 'El nombre del usuario es obligatorio',
         'email.required' => 'El email del usuario es obligatorio',
         'email.email' => 'El email no tiene un formato válido',
         'password.required' => 'La contraseña es obligatoria',
         'password.min' => 'La contraseña debe tener al menos :min caracteres',
         'password.confirmed' => 'La confirmación de la contraseña no coincide',
      ];
   }
}

<?php

namespace App\Http\Requests;

use App\Rules\BankCodeUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBankRequest extends FormRequest
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
         'code' => [
            'required',
            'min:3',
            'max:12',
            new BankCodeUniqueRule,
         ],
         'name' => 'required',
         'account_id' => 'required'
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.min' => 'El código debe tener al menos :min caracteres',
         'code.max' => 'El código debe tener como máximo :max caracteres',
         'name.required' => 'El nombre del banco es obligatorio',
      ];
   }
}

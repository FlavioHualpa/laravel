<?php

namespace App\Http\Requests;

use App\Rules\StateCodeUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreStateRequest extends FormRequest
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
            'between:3,8',
            new StateCodeUniqueRule
         ],
         'name' => 'required|between:3,250',
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.between' => 'El código debe tener entre :min y :max caracteres',
         'name.required' => 'El nombre de la provincia es obligatorio',
         'name.between' => 'El nombre de la provincia debe tener entre :min y :max caracteres',
      ];
   }
}

<?php

namespace App\Http\Requests;

use App\Rules\ConditionCodeUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateConditionRequest extends FormRequest
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
      $condition = $this->route()->parameters['condition'];

      return [
         'code' => [
            'required',
            'between:3,8',
            new ConditionCodeUniqueRule($condition)
         ],
         'name' => 'required|between:3,250',
         'product_tax' => 'required|numeric|between:0,100',
         'final_tax' => 'required|numeric|between:0,100',
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.between' => 'El código debe tener entre :min y :max caracteres',
         'name.required' => 'La condición es obligatoria',
         'name.between' => 'La condición debe tener entre :min y :max caracteres',
         'product_tax.required' => 'El IVA producto es obligatorio',
         'product_tax.numeric' => 'El IVA producto debe ser un valor decimal',
         'product_tax.between' => 'El IVA producto debe ser un valor decimal entre :min y :max',
         'final_tax.required' => 'El IVA final es obligatorio',
         'final_tax.numeric' => 'El IVA final debe ser un valor decimal',
         'final_tax.between' => 'El IVA final debe ser un valor decimal entre :min y :max',
      ];
   }
}

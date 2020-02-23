<?php

namespace App\Http\Requests;

use App\Rules\ProductCodeUniqueRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            new ProductCodeUniqueRule,
         ],
         'description' => 'required',
         'product_image' => 'file|mimes:jpg,jpeg,png,bmp',
         'status' => 'required'
      ];
   }

   public function messages()
   {
      return [
         'code.required' => 'El código es obligatorio',
         'code.min' => 'El código debe tener al menos :min caracteres',
         'code.max' => 'El código debe tener como máximo :max caracteres',
         'description.required' => 'La descripción es obligatoria',
         'product_image.mimes' => 'La imagen debe tener el formato bmp, jpg o png',
         'status.required' => 'Por favor elija una opción'
      ];
   }
}

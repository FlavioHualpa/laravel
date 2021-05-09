<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiKey;
use App\Models\Message;

class ApiController extends Controller
{
   public function getMessage(Request $request, $message_id)
   {
      $key = $request->query('key');

      if (empty($key))
      {
         return [
            'error' => [
               'code' => 1,
               'description' => 'Debe suministrar la clave de acceso'
            ]
         ];
      }
      
      if (ApiKey::where('key', $key)->count() == 0)
      {
         return [
            'error' => [
               'code' => 2,
               'description' => 'La clave suministrada es incorrecta'
            ]
         ];
      }

      $message = Message::find($message_id);

      if (empty($message))
      {
         return [
            'error' => [
               'code' => 3,
               'description' => 'El mensaje solicitado no existe'
            ]
         ];
      }

      return $message;
   }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   public function selectCustomer()
   {
      $user = auth()->user();
      $rol = $user->rol->nombre;

      if (! $user->esAdminVendedor())
         return redirect()->route('home');
      
      switch ($rol)
      {
         case User::ROL_ADMIN:
            
            $clientes = User::whereNotNull('id_vendedor')
               ->orderBy('razon_social')
               ->get();
         break;
         
         case User::ROL_VEND:
            
            $clientes = User::where('id_vendedor', $user->id)
               ->orderBy('razon_social')
               ->get();
         break;
      }

      return view('auth.select-customer', [
         'clientes' => $clientes
      ]);
   }
   
   public function setCustomer(Request $request)
   {
      $request->validate(
         [
            'id_cliente' => 'required'
         ],
         [
            'required' => 'Por favor seleccioná un cliente'
         ]
      );
      
      session([
         config('auth.session_customer_key') => User::findOrFail($request->id_cliente)
      ]);
      
      return redirect()->route('home');
   }
}

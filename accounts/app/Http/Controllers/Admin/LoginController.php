<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   public function __construct()
   {
      $this->middleware('guest:admin')->except('logout');
   }
   
   public function showLoginForm()
   {
      return view('admin.fnlogin');
   }
   
   public function login(Request $request)
   {
      // Validate the form data
      $request->validate([
         'email'   => 'required|email',
         'password' => 'required'
      ], [
         'email.required' => 'El email es obligatorio',
         'email.email' => 'El email no tiene un formato válido',
         'password.required' => 'Debe ingresar la contraseña',
      ]);

      // Attempt to log the user in
      if (auth('admin')
         ->attempt([
            'email' => $request->email,
            'password' => $request->password
         ],
         $request->remember))
      {
         // if successful, then redirect to their intended location
         return redirect()->intended(route('admin.home'));
      }
      
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()
         ->back()
         ->withInput($request->only('email', 'remember'));
   }
}
   
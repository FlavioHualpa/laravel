<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */
   
   use AuthenticatesUsers;
   
   /**
   * Where to redirect users after login.
   *
   * @var string
   */
   protected $redirectTo = RouteServiceProvider::HOME;
   
   /**
   * Create a new controller instance.
   *
   * @return void
   */
   public function __construct()
   {
      $this->middleware('guest')->except('logout');
   }
   
   /**
   * Get the login username to be used by the controller.
   *
   * @return string
   */
   public function username()
   {
      return 'cuit';
   }
   
   /**
   * Get the needed authorization credentials from the request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
   protected function credentials(Request $request)
   {
      return [
         $this->username() => str_replace('-', '', $request->input($this->username())),
         'password' => $request->password
      ];
   }
   
   /**
   * Validate the user login request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return void
   *
   * @throws \Illuminate\Validation\ValidationException
   */
   protected function validateLogin(Request $request)
   {
      $request->validate(
         [
            $this->username() => 'required|string',
            'password' => 'required|string',
         ],
         [
            'cuit.required' => 'Por favor ingresá tu CUIT',
            'password.required' => 'Por favor ingresá tu contraseña',
         ]
      );
   }
   
   protected function sendLoginResponse(Request $request)
   {
      $request->session()->regenerate();

      $this->clearLoginAttempts($request);

      // if ($response = $this->authenticated($request, $this->guard()->user())) {
      //    return $response;
      // }

      return $request->wantsJson()
                  ? new Response('', 204)
                  : redirect($this->redirectTo());
                  // : redirect()->intended($this->redirectPath());
   }
   
   protected function redirectTo()
   {
      $user = auth()->user();
      
      if ($user->esAdminVendedor())
         return route('select.customer');
      
      return redirect()->intended(route('home'))->getTargetUrl();
      // return route('home');
   }
}

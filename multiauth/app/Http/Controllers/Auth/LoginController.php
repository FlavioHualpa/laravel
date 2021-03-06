<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
        $this->middleware('guest:user,delegate,supervisor,admin')
            ->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Obtengo un array con todos los tipos de usuario
        // con el email ingresado
        $profiles = $this->findProfiles($request);

        if (count($profiles) > 1) {
            return view('auth.chooseProfile')
                ->with('profiles', $profiles)
                ->withInput($request->all());
        }

        return $this->loginResponse($request);
    }

    protected function loginResponse(Request $request, $guard = null)
    {
        if ($this->attemptLogin($request, $guard)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function loginWithProfile(Request $request)
    {
        $request->validate([
            'profile' => 'required'
        ], [
            'required' => 'Debe seleccionar un perfil'
        ]);

        $guard = $this->findGuard($request);

        return $this->loginResponse($request, $guard);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'required' => 'Este campo es obligatorio',
            'string' => 'Debe escribir un texto'
        ]);
    }

    protected function findProfiles(Request $request)
    {
        $profiles = [];

        foreach (config('auth.providers') as $provider)
        {
            $model = $provider['model'];

            if ($profile = $model::where('email', $request->email)->first())
            {
                $profiles[] = $profile;
            }
        }

        return $profiles;
    }

    protected function findGuard(Request $request)
    {
        $model = $request->profile;

        $provider = $this->find_key($model, 'model', config('auth.providers'));
        $guard = $this->find_key($provider, 'provider', config('auth.guards'));

        return $guard;
    }

    private function find_key($value, $subKey, $array)
    {
        foreach ($array as $key => $subArray)
        {
            if ($subArray[$subKey] == $value)
                return $key;
        }

        return false;
    }

    protected function attemptLogin(Request $request, $guard = null)
    {
        $credentials = $request->only('email', 'password');

        if ($guard) {
            $guards = [ $guard ];
        }
        else {
            $guards = ['user', 'delegate', 'supervisor', 'admin'];
        }

        foreach ($guards as $guard)

            if (Auth::guard($guard)->attempt(
                $credentials,
                $request->filled('remember')))

                return true;

        return false;
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        // if ($response = $this->authenticated($request, Auth::guard()->user())) {
        //     return $response;
        // }

        return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect()->intended($this->redirectPath());
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // if ($response = $this->loggedOut($request)) {
        //     return $response;
        // }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }
}

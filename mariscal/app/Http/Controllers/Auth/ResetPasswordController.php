<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/password/changed'; // RouteServiceProvider::HOME;

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'cuit' => $request->cuit]
        );
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'cuit' => 'required|exists:users',
            'password' => 'required|confirmed|min:6',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'required' => 'Por favor completá este campo',
            'exists' => 'No tenemos registrado un usuario con este cuit',
            'confirmed' => 'La contraseña y la confirmación no coinciden',
            'min' => 'La contraseña debe tener al menos :min caracteres',
        ];
    }

    protected function credentials(Request $request)
    {
        return $request->only(
            'cuit', 'password', 'password_confirmation', 'token'
        );
    }

    protected function resetPassword($user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'cuit' => [trans($response)],
            ]);
        }

        return redirect()->back()
                    ->withInput($request->only('cuit'))
                    ->withErrors(['cuit' => trans($response)]);
    }
}

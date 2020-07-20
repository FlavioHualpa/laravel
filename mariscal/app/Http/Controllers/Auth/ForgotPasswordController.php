<?php

namespace App\Http\Controllers\Auth;

use Closure;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateCuit($request);

        // con este método cambiamos el mail de laravel
        // con el link para cambiar la contraseña por
        // uno con diseño propio
        // $notifiable es el usuario que pide el cambio
        // nuestra función debe retornar el objeto Mail

        \Illuminate\Auth\Notifications\ResetPassword::toMailUsing(
            function ($notifiable, $token) {
                return (new \App\Mail\CambiarContraseña(
                            $notifiable,
                            $token))
                        ->subject('Solicitud de cambio de contraseña')
                        ->to($notifiable);
            }
        );

        // We will send the password reset link to this user.
        // Once we have attempted to send the link, we will examine
        // the response then see the message we need to show to the user.
        // Finally, we'll send out a proper response.

        $response = $this->broker()->sendResetLink(
            $this->credentials($request)
        );

        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($request, $response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
    
    protected function validateCuit(Request $request)
    {
        $request->validate(['cuit' => 'required|exists:users']);
    }

    protected function credentials(Request $request)
    {
        return $request->only('cuit');
    }

    protected function sendResetLinkResponse(Request $request, $response)
    {
        return $request->wantsJson()
                    ? new JsonResponse(['message' => trans($response)], 200)
                    : back()->with('status', trans($response, [
                        'email' => User::where('cuit', $request->cuit)
                        ->first()->email
                    ]));
    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            throw ValidationException::withMessages([
                'cuit' => [trans($response)],
            ]);
        }

        return back()
                ->withInput($request->only('cuit'))
                ->withErrors(['cuit' => trans($response)]);
    }
}

<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $canLogin = false;

        foreach ($guards as $guard)
            $canLogin |= ! Auth::guard($guard)->check();

        if ($canLogin)
            return $next($request);

        return redirect(RouteServiceProvider::HOME);
    }
}

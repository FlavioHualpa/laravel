<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Admin extends Middleware
{
   /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
   // protected function redirectTo($request)
   // {
   //    dd('redirect');
      
   //    if (! $request->expectsJson()) {
   //       return route('login');
   //    }
   // }
   
   /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @param  string|null  $guard
   * @return mixed
   */
   public function handle($request, Closure $next, ...$guard)
   {
      if ($request->user()->role != 'admin') {
         return redirect()->route('admin.notallowed');
      }
      
      return $next($request);
   }
}

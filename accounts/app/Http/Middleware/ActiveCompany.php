<?php

namespace App\Http\Middleware;

use Closure;
use App\Company;
use Illuminate\Support\Facades\Cookie;

class ActiveCompany
{
   /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
   public function handle($request, Closure $next)
   {      
      $user_id = auth()->id();
      $cookie_name = "user_" . $user_id . "_active_company";
      $active_company_id = Cookie::get($cookie_name);
      $active_company = Company::find($active_company_id);

      if ($active_company)
      {
         session()->put([
            'active_company' => $active_company
         ]);
      }
      elseif (auth()->user()->account->companies->count())
      {
         $active_company = auth()->user()->account->companies->first();
         Cookie::queue($cookie_name, $active_company->id, 60 * 24 * 7);
         // le damos a la cookie una semana de validez
         // y disponible en todo el sitio
         
         session()->put([
            'active_company' => $active_company
         ]);
      }
      else
      {
         session()->forget('active_company');
         return redirect()->route('no.company');
      }
      
      return $next($request);
   }
}

<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
   use HandlesAuthorization;
   
   /**
   * Create a new policy instance.
   *
   * @return void
   */
   public function __construct()
   {
      //
   }

   public function manage(User $user)
   {
      return $user->rol->nombre == User::ROL_ADMIN; // 'Administrador';
   }
}

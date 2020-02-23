<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showReservations()
    {
        $user = auth()->user();
        
        return view('user.reservations')
            ->with([
                'user' => $user,
                'rooms' => $user->reservations,
            ]);
    }
}

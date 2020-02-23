<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('admin.users')->with('users', $users);
    }

    public function show(User $user)
    {
        //
    }
}

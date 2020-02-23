<?php

namespace App\Http\Controllers;

use App\User;
use App\OrderQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:admin');
   }
   
   public function index()
   {
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'name', 'email', 'created_at'
      ]);
      
      $account_id = auth('admin')->id();
      $users = User::orderBy($order, $dir)
                     ->where('account_id', $account_id)
                     ->get();
      
      return view('admin.users.search')
               ->with([
                  'users' => $users
               ]);
   }

   public function create()
   {
      return view('admin.users.create');
   }

   public function store(StoreUserRequest $request)
   {
      User::create([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'account_id' => $request->account_id,
         'created_at' => now(),
         'updated_at' => now(),
      ]);

      return redirect()->route('admin.users.search');
   }

   public function edit(User $user)
   {
      return view('admin.users.edit')->with('user', $user);
   }

   public function update(UpdateUserRequest $request, User $user)
   {
      $user->update([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
         'updated_at' => now(),
      ]);

      return redirect()->route('admin.users.search');
   }
}

<?php

namespace App\Http\Controllers;

use App\State;
use App\OrderQuery;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;
use Illuminate\Http\Request;

class StateController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:admin');
   }

   public function index()
   {
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'created_at'
      ]);

      $account_id = auth('admin')->id();
      $states = State::orderBy($order, $dir)
                     ->where('account_id', $account_id)
                     ->get();

      return view('admin.states.search')
               ->with([
                  'states' => $states
               ]);
   }

   public function create()
   {
      return view('admin.states.create');
   }

   public function store(StoreStateRequest $request)
   {
      State::create([
         'code' => $request->code,
         'name' => $request->name,
         'account_id' => $request->account_id,
      ]);

      return redirect()->route('admin.states.search');
   }

   public function edit(State $state)
   {
      return view('admin.states.edit')
            ->with('state', $state);
   }

   public function update(UpdateStateRequest $request, State $state)
   {
      $state->update([
         'code' => $request->code,
         'name' => $request->name,
      ]);

      return redirect()->route('admin.states.search');
   }
}

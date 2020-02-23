<?php

namespace App\Http\Controllers;

use App\Condition;
use App\Http\Requests\StoreConditionRequest;
use App\Http\Requests\UpdateConditionRequest;
use Illuminate\Http\Request;

class ConditionsController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:admin');
   }

   public function index()
   {
      $conditions = Condition::orderedByName()->get();

      return view('admin.conditions.search')
            ->with([ 'conditions' => $conditions ]);
   }

   public function create()
   {
      return view('admin.conditions.create');
   }

   public function store(StoreConditionRequest $request)
   {
      Condition::create([
         'account_id' => $request->account_id,
         'code' => $request->code,
         'name' => $request->name,
         'tax' => $request->tax / 100,
      ]);

      return redirect()->route('admin.conditions.search');
   }

   public function edit(Condition $condition)
   {
      return view('admin.conditions.edit')
               ->with('condition', $condition);
   }

   public function update(UpdateConditionRequest $request, Condition $condition)
   {
      $condition->update([
         'code' => $request->code,
         'name' => $request->name,
         'tax' => $request->tax / 100,
      ]);

      return redirect()->route('admin.conditions.search');
   }
}

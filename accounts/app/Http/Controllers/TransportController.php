<?php

namespace App\Http\Controllers;

use App\OrderQuery;
use App\Transport;
use App\State;
use App\Http\Requests\StoreTransportRequest;
use App\Http\Requests\UpdateTransportRequest;
use Illuminate\Http\Request;

class TransportController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth:admin');
   }

   public function index()
   {
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'street', 'phone', 'created_at'
      ]);

      $account_id = auth('admin')->id();
      $transports = Transport::orderBy($order, $dir)
                        ->where('account_id', $account_id)
                        ->get();

      return view('admin.transports.search')
               ->with([
                  'transports' => $transports
               ]);
   }

   public function create()
   {
      $states = State::orderBy('name')->get();

      return view('admin.transports.create')
            ->with([ 'states' => $states ]);
   }

   public function store(StoreTransportRequest $request)
   {
      Transport::create([
         'account_id' => $request->account_id,
         'code' => $request->code,
         'name' => $request->name,
         'address' => $request->address,
         'phone' => $request->phone,
      ]);

      return redirect()->route('admin.transports.search');
   }

   public function edit(Transport $transport)
   {
      $states = State::orderBy('name')->get();

      return view('admin.transports.edit')
            ->with([
               'transport' => $transport,
               'states' => $states,
            ]);
   }

   public function update(UpdateTransportRequest $request, Transport $transport)
   {
      $transport->update([
         'code' => $request->code,
         'name' => $request->name,
         'address' => $request->address,
         'phone' => $request->phone,
      ]);

      return redirect()->route('admin.transports.search');
   }
}

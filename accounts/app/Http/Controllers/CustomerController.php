<?php

namespace App\Http\Controllers;

use App\Condition;
use App\Customer;
use App\State;
use App\OrderQuery;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');
   }

   public function home()
   {
      return view('customers.home');
   }
   
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $filter = request()->query('q');
      $show = request()->query('show');
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'address.street', 'fiscal_id', 'status'
      ]);
      
      $customers = Customer::filteredAndSorted($filter, $show, $order, $dir)
                           ->get();
      
      return view('customers.search')->with('customers', $customers);
   }
   
   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      $states = State::orderBy('name')->get();
      $conditions = Condition::orderBy('name')->get();

      return view('customers.create')
            ->with([
               'states' => $states,
               'conditions' => $conditions
            ]);
   }
   
   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(StoreCustomerRequest $request)
   {
      Customer::create($request->all());

      return redirect()->route('customers.search');
   }
   
   /**
   * Display the specified resource.
   *
   * @param  \App\Customer  $customer
   * @return \Illuminate\Http\Response
   */
   public function show(Customer $customer)
   {
      //
   }
   
   /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Customer  $customer
   * @return \Illuminate\Http\Response
   */
   public function edit(Customer $customer)
   {
      $states = State::orderBy('name')->get();
      $conditions = Condition::orderBy('name')->get();

      return view('customers.edit')
         ->with([
            'customer' => $customer,
            'states' => $states,
            'conditions' => $conditions,
         ]);
   }
   
   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Customer  $customer
   * @return \Illuminate\Http\Response
   */
   public function update(UpdateCustomerRequest $request, Customer $customer)
   {
      $customer->code = $request->code;
      $customer->name = $request->name;
      $customer->address = $request->address;
      $customer->phone = $request->phone;
      $customer->email = $request->email;
      $customer->fiscal_id = $request->fiscal_id;
      $customer->condition_id = $request->condition_id;
      $customer->status = $request->status;
      $customer->save();

      return redirect()->route('customers.search');
   }
   
   /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Customer  $customer
   * @return \Illuminate\Http\Response
   */
   public function destroy(Customer $customer)
   {
      //
   }

   public function getFinalTax()
   {
      if (request('customer_id'))
      {
         $customer = Customer::find(request('customer_id'));

         if ($customer)
         {
            return [
               'final_tax' => $customer->condition->final_tax
            ];
         }
      }

      return [
         'final_tax' => 0.0
      ];
   }
}

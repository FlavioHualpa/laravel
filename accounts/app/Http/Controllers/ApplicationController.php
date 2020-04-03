<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Facades\Balance;
use App\Http\Requests\StoreApplicationRequest;

class ApplicationController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');
   }

   public function create()
   {
      $customers = Customer::orderedByName()->get();

      $query = request()->query('customer_id');

      if ($query) {
         $customer = Customer::findOrFail($query);
      }
      else if ($customers->count()) {
         $customer = $customers->first();
      }
      else {
         $customer = null;
      }

      $apply_from_list = ($customer) ?
         Balance::still_to_apply_payments($customer) : [];

      $apply_to_list = ($customer) ?
         Balance::still_to_apply_invoices($customer) : [];

      return view('applications.create')
               ->with([
                  'customers' => $customers,
                  'apply_from' => $apply_from_list,
                  'apply_to' => $apply_to_list,
               ]);
   }

   public function store(StoreApplicationRequest $request)
   {
      $items = $request->item;
      $header = $request->header;

      foreach ($items as $item)
      {
         $invoice = Invoice::findOrFail($item['invoice_id']);

         if ($item['amount'] > 0.0)
         {
            $invoice->applied_payments()->attach(
               $header['applicant_id'], [
                  'applicant_type' => $header['applicant_type'],
                  'created_at' => $header['date'],
                  'updated_at' => $header['date'],
                  'amount' => $item['amount'],
               ]
            );
         }
      }

      return redirect()
            ->route('applications.create')
            ->with('status', 'Has aplicado el pago correctamente');
   }
}

<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\State;
use App\Facades\LocalFormat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class CustomerReportController extends Controller
{
   private $parameters;
   private $rules;
   private $messages;

   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');

      require 'CustomerReportParamAndRules.php';
   }

   public function index()
   {
      return view('reports.customers.index');
   }

   public function parameters($report_id)
   {
      if ($report_id < 0 || $report_id >= count($this->parameters))
         return view('reports.notfound');
      
      $customers = Customer::orderedByName()->get();

      return view('reports.customers.parameters', [
         'parameters' => $this->parameters[$report_id],
         'customers' => $customers,
      ]);
   }

   public function show(Request $request, $report_id)
   {
      if ($report_id < 0 || $report_id >= count($this->parameters))
         return view('reports.notfound');
      
      $validator = Validator::make(
         $request->all(),
         $this->rules[$report_id],
         $this->messages
      );

      $validated = $validator->validate();
      $view = $this->parameters[$report_id]['show_function']($request);

      $this->setCookies($request);

      return $view;
   }

   private function setCookies(Request $request)
   {
      $user_id = auth()->user()->id;

      Cookie::queue(
         'user_' . $user_id . '_from_customer_id',
         $request->from_customer_id,
         60*24*7
      );

      if ($request->has('to_customer_id'))
      {
         Cookie::queue(
            'user_' . $user_id . '_to_customer_id',
            $request->to_customer_id,
            60*24*7
         );
      }

      if ($request->has('from_date'))
      {
         Cookie::queue(
            'user_' . $user_id . '_from_date',
            $request->from_date,
            60*24*7
         );
      }

      if ($request->has('to_date'))
      {
         Cookie::queue(
            'user_' . $user_id . '_to_date',
            $request->to_date,
            60*24*7
         );
      }
   }

   public function show_operations(Request $request)
   {
      $customer = Customer::findOrFail($request->from_customer_id);

      $invoices = $customer->invoices()
                  ->whereBetween('created_at', [
                     min($request->from_date, $request->to_date),
                     max($request->from_date, $request->to_date),
                  ])
                  ->with(['invoice_type', 'products'])
                  ->get();

      $payments = $customer->payments()
                  ->whereBetween('created_at', [
                     min($request->from_date, $request->to_date),
                     max($request->from_date, $request->to_date),
                  ])
                  ->with('payment_methods')
                  ->get();

      $operations = $invoices
         ->merge($payments)
         ->sortBy('created_at');

      $total = $operations->sum(function ($item) {
         if ($item instanceOf Invoice) {
            $sign = $item->invoice_type->balance == 'inc' ? 1 : -1;
            return $item->final_amount_with_tax() * $sign;
         }
         else {
            return -$item->total();
         }
      });

      return view('reports.customers.operations', [
         'customer' => $customer,
         'operations' => $operations,
         'from_date' => Carbon::make($request->from_date),
         'to_date' => Carbon::make($request->to_date),
         'total' => $total,
      ]);
   }

   public function show_balance(Request $request)
   {
      $customer = Customer::findOrFail($request->from_customer_id);

      $invoices = $customer->invoices()
                  ->with(['invoice_type', 'products'])
                  ->get();

      $payments = $customer->payments()
                  ->with('payment_methods')
                  ->get();

      $merged = $invoices
         ->merge($payments)
         ->sortBy('created_at');

      $operations = [];
      $total = 0.0;

      foreach ($merged as $item)
      {
         if ($item instanceOf Invoice)
         {
            $remaining = $item->remaining_not_applied();
            if ($remaining > 0.0)
            {
               $original = $item->final_amount_with_tax();
               $sign = $item->invoice_type->balance == 'inc' ? 1.0 : -1.0;
               $total += $remaining * $sign;

               $operations[] = [
                  'date' => Carbon::make($item->created_at),
                  'description' => $item->invoice_type->name,
                  'number' => $item->number,
                  'original_amount' => LocalFormat::currency($original * $sign),
                  'remaining_amount' => LocalFormat::currency($remaining * $sign),
               ];
            }
         }
         else
         {
            $remaining = $item->remaining_to_apply();
            if ($remaining > 0.0)
            {
               $original = $item->total();
               $total -= $remaining;

               $operations[] = [
                  'date' => Carbon::make($item->created_at),
                  'description' => 'Recibo',
                  'number' => $item->number,
                  'original_amount' => LocalFormat::currency(-$original),
                  'remaining_amount' => LocalFormat::currency(-$remaining),
               ];
            }
         }
      }

      return view('reports.customers.balance', [
         'customer' => $customer,
         'operations' => $operations,
         'total' => $total,
      ]);
   }

   public function show_totals(Request $request)
   {
      $from_customer = Customer::findOrFail($request->from_customer_id);
      $to_customer = Customer::findOrFail($request->to_customer_id);
      $company_id = session('active_company')->id;

      $customers = Customer::where('company_id', $company_id)
         ->whereBetween('name', [
            min($from_customer->name, $to_customer->name),
            max($from_customer->name, $to_customer->name),
         ])
         ->orderBy('name')
         ->get();
      
      $totals = [];
      $grand_total = 0.0;

      foreach ($customers as $customer)
      {
         $invoices = $customer->invoices()
                     ->with(['invoice_type', 'products'])
                     ->get();

         $payments = $customer->payments()
                     ->with('payment_methods')
                     ->get();
         
         $customer_total = 0.0;
         $customer_total += $invoices->sum(function($invoice) {
            $sign = $invoice->invoice_type->balance == 'inc' ? 1 : -1;
            return $invoice->final_amount_with_tax() * $sign;
         });

         $customer_total -= $payments->sum(function($payment) {
            return $payment->total();
         });

         $totals[] = [
            'code' => $customer->code,
            'name' => $customer->name,
            'balance' => $customer_total,
            'last_invoice' => $invoices->max('created_at'),
            'last_payment' => $payments->max('created_at'),
         ];

         $grand_total += $customer_total;
      }

      return view('reports.customers.totals', [
         'from_customer' => $from_customer,
         'to_customer' => $to_customer,
         'totals' => $totals,
         'grand_total' => $grand_total,
      ]);
   }

   public function show_profiles(Request $request)
   {
      $from_customer = Customer::findOrFail($request->from_customer_id);
      $to_customer = Customer::findOrFail($request->to_customer_id);
      $company_id = session('active_company')->id;
      
      $states = State::all();

      $customers = Customer::where('company_id', $company_id)
         ->whereBetween('name', [
            min($from_customer->name, $to_customer->name),
            max($from_customer->name, $to_customer->name),
         ])
         ->orderBy('name')
         ->get();

      return view('reports.customers.profiles', [
         'from_customer' => $from_customer,
         'to_customer' => $to_customer,
         'customers' => $customers,
         'states' => $states,
      ]);
   }
}

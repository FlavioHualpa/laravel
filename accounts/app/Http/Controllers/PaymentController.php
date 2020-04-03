<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BankAccount;
use App\Customer;
use App\Payment;
use App\PaymentMethod;
use App\Http\Requests\StorePaymentRequest;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');
   }

   public function create()
   {
      $customers = Customer::orderedByName()->get();
      $payment_methods = PaymentMethod::orderedByName()->get();
      $banks = Bank::orderedByName()->get();
      $bank_accounts = BankAccount::orderedByName()->get();

      return view('payments.create')
            ->with([
               'customers' => $customers,
               'payment_methods' => $payment_methods,
               'banks' => $banks,
               'bank_accounts' => $bank_accounts,
            ]);
   }

   public function store(StorePaymentRequest $request)
   {
      // dd(request()->all());

      $payment = Payment::create([
         'customer_id' => $request->header['customer_id'],
         'number' => $request->header['number'],
         'created_at' => $request->header['date'],
         'updated_at' => $request->header['date'],
      ]);

      foreach ($request->item as $item)
      {
         switch ($item['method_type_code'])
         {
            case 'cash':
               $details = null;
            break;

            case 'check':
               $details = [
                  'bank_id' => $item['bank_id'],
                  'number' => $item['number'],
                  'due_date' => $item['due_date'],
               ];
            break;

            case 'deposit':
               $details = [
                  'account_id' => $item['account_id'],
                  'number' => $item['number'],
                  'due_date' => $item['due_date'],
               ];
            break;
         }

         $payment->payment_methods()->attach(
            $item['payment_method_id'],
            [
               'amount' => $item['amount'],
               'comment' => $item['comment'],
               'details' => json_encode($details),
            ]
         );
      }

      return redirect()
         ->route('payments.create')
         ->with('status', 'Se ha ingresado correctamente el Recibo Nº ' . $request->header['number']);
   }

   public function checkNumber(Request $request)
   {
      if (! session('active_company'))
         return [ 'response' => true ];

      $active_company_id = session('active_company')->id;

      $result = Payment::select('payments.number')
               ->join('customers', 'payments.customer_id', '=', 'customers.id')
               ->where('customers.company_id', $active_company_id)
               ->where('payments.number', $request->number)
               ->exists();
      
      return [ 'response' => $result ];
   }
}

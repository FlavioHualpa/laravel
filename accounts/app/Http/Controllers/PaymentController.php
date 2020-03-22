<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BankAccount;
use App\Customer;
use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
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

   public function store()
   {
      dd(request()->all());
   }
}

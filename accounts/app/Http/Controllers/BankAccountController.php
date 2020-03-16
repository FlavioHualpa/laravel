<?php

namespace App\Http\Controllers;

use App\Bank;
use App\BankAccount;
use App\OrderQuery;
use App\Http\Requests\StoreBankAccountRequest;
use App\Http\Requests\UpdateBankAccountRequest;

class BankAccountController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function home()
   {
      return view('bank-accounts.home');
   }

   public function index()
   {
      $filter = request()->query('q');
      $show = request()->query('show');
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'number', 'bank_id', 'created_at'
      ]);
      
      $bank_accounts = BankAccount::filteredAndSorted(
                           $filter, $show, $order, $dir)
                           ->with('bank')
                           ->get();
      
      return view('bank-accounts.search')
               ->with('bank_accounts', $bank_accounts);
   }

   public function create()
   {
      $banks = Bank::orderedByName()->get();

      return view('bank-accounts.create')
               ->with('banks', $banks);
   }

   public function store(StoreBankAccountRequest $request)
   {
      BankAccount::create(
         $request->validated()
      );

      return redirect()->route('bank-accounts.search');
   }

   public function edit(BankAccount $bank_account)
   {
      $banks = Bank::orderedByName()->get();

      return view('bank-accounts.edit')
               ->with([
                  'bank_account' => $bank_account,
                  'banks' => $banks,
               ]);
   }

   public function update(UpdateBankAccountRequest $request, BankAccount $bank_account)
   {
      $bank_account->update(
         $request->validated()
      );

      return redirect()->route('bank-accounts.search');
   }
}

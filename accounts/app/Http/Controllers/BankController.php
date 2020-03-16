<?php

namespace App\Http\Controllers;

use App\Bank;
use App\OrderQuery;
use App\Http\Requests\StoreBankRequest;
use App\Http\Requests\UpdateBankRequest;

class BankController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function home()
   {
      return view('banks.home');
   }

   public function index()
   {
      $filter = request()->query('q');
      $show = request()->query('show');
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'created_at'
      ]);
      
      $banks = Bank::filteredAndSorted($filter, $show, $order, $dir)
                  ->get();
      
      return view('banks.search')->with('banks', $banks);
   }

   public function create()
   {
      return view('banks.create');
   }

   public function store(StoreBankRequest $request)
   {
      Bank::create(
         $request->validated()
      );

      return redirect()->route('banks.search');
   }

   public function edit(Bank $bank)
   {
      return view('banks.edit')->with('bank', $bank);
   }

   public function update(UpdateBankRequest $request, Bank $bank)
   {
      $bank->update(
         $request->validated()
      );

      return redirect()->route('banks.search');
   }
}

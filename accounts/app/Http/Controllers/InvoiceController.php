<?php

namespace App\Http\Controllers;

use App\Customer;
use App\PriceList;
use App\Product;
use App\Transport;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
  public function create()
   {
      $customers = Customer::orderedByName()->get();
      $transports = Transport::orderedByName()->get();
      $price_lists = PriceList::orderedByName()->get();
      $products = Product::orderedByCode()->get();

      return view('invoices.create')
            ->with([
               'customers' => $customers,
               'transports' => $transports,
               'price_lists' => $price_lists,
               'products' => $products,
            ]);
   }
}

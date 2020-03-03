<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\PriceList;
use App\Product;
use App\Transport;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   public function show(Invoice $invoice)
   {
      dd($invoice);
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

   public function store(StoreInvoiceRequest $request)
   {
      // dd($request->all());
      // dd($request->input('header.invoice_type_id'));

      $invoice = new Invoice($request->input('header.invoice_type_id'));
      $invoice->company_id = $request->input('company_id');
      $invoice->customer_id = $request->input('header.customer_id');
      $invoice->transport_id = $request->input('header.transport_id');
      $invoice->price_list_id = $request->input('header.price_list_id');
      $invoice->save();

      foreach ($request->input('item') as $item)
      {
         if ($item['id'])
         {
            $invoice->products()->attach(
               $item['id'], [
                  'description' => $item['description'],
                  'quantity' => $item['quantity'],
                  'price' => $item['price'],
               ]
            );
         }
      }

      return redirect()->route('invoices.show', $invoice->id);
   }
}

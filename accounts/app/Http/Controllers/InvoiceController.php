<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\PriceList;
use App\Product;
use App\Transport;
use App\Notifications\InvoiceNotification;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;

class InvoiceController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   private function load_relations(Invoice $invoice)
   {
      $invoice->load('products');
      $invoice->load('company');
      $invoice->load('customer');
      $invoice->load('transport');
      $invoice->load('invoice_type');
   }

   public function notify(Invoice $invoice)
   {
      $this->load_relations($invoice);
      $invoice->customer->notify(new InvoiceNotification($invoice));

      return redirect()
         ->route('invoices.create')
         ->with('status', 'Comprobante Generado!');
   }

   public function show(Invoice $invoice)
   {
      $this->load_relations($invoice);
      $pdf = \PDF::makeInvoicePDF($invoice);
      $pdfName = $invoice->company->name . ' - ' .
         $invoice->invoice_type->name . ' Nro ' .
         $invoice->number . '.pdf';

      return $pdf->stream(
         $pdfName,
         [ 'Attachment' => 0 ]
      );
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
      $invoice = new Invoice;
      $invoice->get_next_number($request->input('header.invoice_type_id'));
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

      return redirect()->route('invoices.notify', $invoice->id);
   }

   public function make_invoices()
   {
      $max_inv = 50;
      $customers = Customer::where('company_id', 3)->get();
      $inv_types = \App\InvoiceType::all();
      $transports = Transport::where('account_id', 1)->get();
      $lists = PriceList::where('company_id', 3)->get();
      $products = Product::where('company_id', 3)->get();
      $date = \Carbon\Carbon::create(2019, 1, 2);

      for ($i = 0; $i < $max_inv; $i++)
      { 
         $cust = $customers->random();
         $inv_type = $inv_types->where('condition_id', $cust->condition_id)->first();
         $transp = $transports->random();
         $list = $lists->random();

         $inv = new Invoice;
         $inv->get_next_number($inv_type->id);
         $inv->company_id = 3;
         $inv->customer_id = $cust->id;
         $inv->invoice_type_id = $inv_type->id;
         $inv->transport_id = $transp->id;
         $inv->price_list_id = $list->id;
         $inv->created_at = $date;
         $inv->updated_at = $date;
         $inv->save();

         $max_items = rand(1, 8);
         for ($j = 0; $j < $max_items; $j++)
         {
            $prod = $products->random();
            $inv->products()->attach(
               $prod->id, [
                  'description' => $prod->description,
                  'quantity' => rand(1, 20),
                  'price' => $prod->priceInList($list->id),
               ]
            );
         }

         $n = $i + 1;
         $fdate = $date->format('d-m-Y');
         echo "$n) Factura Nº $inv->number del $fdate\n";

         $cust->notify(new InvoiceNotification($inv));
         $date = $date->addDays(rand(0, 10));
      }

      echo "\n";
      echo "Listo!";
   }
}

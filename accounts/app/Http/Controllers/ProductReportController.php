<?php

namespace App\Http\Controllers;

use App\Product;
use App\Invoice;
use App\State;
use App\Facades\LocalFormat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class ProductReportController extends Controller
{
   private $parameters;
   private $rules;
   private $messages;

   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');

      require 'ProductReportParamAndRules.php';
   }

   public function index()
   {
      return view('reports.products.index');
   }

   public function parameters($report_id)
   {
      if ($report_id < 0 || $report_id >= count($this->parameters))
         return view('reports.notfound');
      
      $products = Product::orderedByCode()->get();

      return view('reports.products.parameters', [
         'parameters' => $this->parameters[$report_id],
         'products' => $products,
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
         'user_' . $user_id . '_from_product_id',
         $request->from_product_id,
         60*24*7
      );

      if ($request->has('to_product_id'))
      {
         Cookie::queue(
            'user_' . $user_id . '_to_product_id',
            $request->to_product_id,
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

   public function show_statistics(Request $request)
   {
      [ $from_product, $to_product, $products ] =
         $this->getProductsList($request);

      $sales = [];
      $total = 0.0;

      foreach ($products as $product)
      {
         $invoices = $product->invoices()
                     ->whereBetween('invoices.created_at', [
                        min($request->from_date, $request->to_date),
                        max($request->from_date, $request->to_date),
                     ])
                     ->with(['invoice_type'])
                     ->get();

         $sold = $invoices->sum(function ($invoice) {
            $sign = $invoice->invoice_type->balance == 'inc' ? 1.0 : -1.0;
            return $invoice->item->quantity * $sign;
         });

         $sales[] = [
            'code' => $product->code,
            'description' => $product->description,
            'sold' => $sold,
            'min_price' => $invoices->min('item.price'),
            'max_price' => $invoices->max('item.price'),
         ];

         $total += $sold;
      }

      return view('reports.products.statistics', [
         'from_product' => $from_product,
         'to_product' => $to_product,
         'sales' => $sales,
         'from_date' => Carbon::make($request->from_date),
         'to_date' => Carbon::make($request->to_date),
         'total' => $total,
      ]);
   }

   public function show_invoices(Request $request)
   {
      $product = Product::findOrFail($request->from_product_id);
      $invoices = $product->invoices()
                  ->whereBetween('invoices.created_at', [
                     min($request->from_date, $request->to_date),
                     max($request->from_date, $request->to_date),
                  ])
                  ->with(['invoice_type'])
                  ->latest()
                  ->get();
      
      $sales = [];
      $total = 0.0;

      foreach ($invoices as $invoice)
      {
         $sign = $invoice->invoice_type->balance == 'inc' ? 1.0 : -1.0;
         $sold = $invoice->item->quantity * $sign;

         $sales[] = [
            'date' => $invoice->created_at,
            'name' => $invoice->invoice_type->name,
            'number' => $invoice->number,
            'sold' => $sold,
            'customer' => $invoice->customer->name,
         ];

         $total += $sold;
      }

      return view('reports.products.invoices', [
         'product' => $product,
         'sales' => $sales,
         'from_date' => Carbon::make($request->from_date),
         'to_date' => Carbon::make($request->to_date),
         'total' => $total,
      ]);
   }

   public function show_sheet(Request $request)
   {
      [ $from_product, $to_product, $products ] =
         $this->getProductsList($request);

      $details = [];
      $total = 0.0;

      foreach ($products as $product)
      {
         $invoices = $product->invoices()
                     ->with(['invoice_type'])
                     ->get();

         $sold = $invoices->sum(function ($invoice) {
            $sign = $invoice->invoice_type->balance == 'inc' ? 1.0 : -1.0;
            return $invoice->item->quantity * $sign;
         });

         $details[] = [
            'code' => $product->code,
            'description' => $product->description,
            'sold' => $sold,
            'percent' => 0.0,
            'last_sale' => $invoices->max('created_at'),
         ];

         $total += $sold;
      }

      for ($i = 0; $i < count($details); $i++) {
         $details[$i]['percent'] = 100.0 * $details[$i]['sold'] / $total;
      }

      return view('reports.products.sheet', [
         'from_product' => $from_product,
         'to_product' => $to_product,
         'details' => $details,
      ]);
   }

   private function getProductsList(Request $request)
   {
      $from_product = Product::findOrFail($request->from_product_id);
      $to_product = Product::findOrFail($request->to_product_id);

      $list = Product::orderedByCode()
         ->whereBetween('code', [
            min($from_product->code, $to_product->code),
            max($from_product->code, $to_product->code),
         ])
         ->get();

      return [ $from_product, $to_product, $list ];
   }
}

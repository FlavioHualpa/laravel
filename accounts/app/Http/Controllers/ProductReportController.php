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

      // $this->setCookies($request);
      $this->setCookies($validated);

      return $view;
   }

   private function setCookies($request)
   {
      dd($request);
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
      $from_product = Product::findOrFail($request->from_product_id);
      $to_product = Product::findOrFail($request->to_product_id);
      $company_id = session('active_company')->id;

      $products = Product::where('company_id', $company_id)
         ->whereBetween('code', [
            min($from_product->code, $to_product->code),
            max($from_product->code, $to_product->code),
         ])
         ->orderBy('code')
         ->get();
      
      $total = 0.0;

      foreach ($products as $product)
      {
         $invoices = $product->invoices()
                     ->whereBetween('invoices.created_at', [
                        min($request->from_date, $request->to_date),
                        max($request->from_date, $request->to_date),
                     ])
                     ->with(['invoice_type', 'products'])
                     ->get();

         $sold = $invoices->sum('item.quantity');

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
}

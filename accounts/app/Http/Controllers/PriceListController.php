<?php

namespace App\Http\Controllers;

use App\PriceList;
use App\Product;
use App\OrderQuery;
use App\Http\Requests\StorePriceListRequest;
use App\Http\Requests\UpdatePriceListRequest;

class PriceListController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('company');
   }

   public function home()
   {
      return view('price-lists.home');
   }

   public function index()
   {
      $filter = request()->query('q');
      $show = request()->query('show');
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'name', 'created_at'
      ]);
      
      $lists = PriceList::filteredAndSorted($filter, $show, $order, $dir)
                        ->get();
      
      return view('price-lists.search')->with('lists', $lists);
   }

   public function create()
   {
      $products = Product::orderedByCode()->get();

      return view('price-lists.create')->with('products', $products);
   }

   public function store(StorePriceListRequest $request)
   {
      $price_list = PriceList::create(
         $request->only([ 'code', 'name', 'company_id' ])
      );

      // agrego los artículos a la lista
      foreach ($request->products as $product)
      {
         $price_list->products()->attach(
            $product['product_id'],
            [
               'price' => $product['price']
            ]
         );
      }

      return redirect()->route('price-lists.search');
   }

   public function edit(PriceList $price_list)
   {
      $products = Product::orderedByCode()->get();

      return view('price-lists.edit')
            ->with([
               'price_list' => $price_list,
               'products' => $products,
            ]);
   }

   public function update(UpdatePriceListRequest $request, PriceList $price_list)
   {
      $price_list->update(
         $request->only([ 'code', 'name' ])
      );

      // actualizo los precios en la lista
      foreach ($request->products as $product)
      {
         $price_list->products()->syncWithoutDetaching([
            $product['product_id'] =>
            [
               'price' => $product['price']
            ]
         ]);
      }

      return redirect()->route('price-lists.search');
   }
}

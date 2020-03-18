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

   public function store()
   {
      dd(request()->all());
   }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use App\OrderQuery;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   
   public function home()
   {
      return view('products.home');
   }
   
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function index()
   {
      $filter = request()->query('q');
      $show = request()->query('show');
      [ $order, $dir ] = OrderQuery::fromQueryString([
         'code', 'description', 'created_at', 'status'
      ]);

      $products = Product::withFilters($filter, $show)
         ->orderBy($order, $dir)
         ->get();
      
      return view('products.search')->with('products', $products);
   }
   
   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('products.create');
   }
   
   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(CreateProductRequest $request)
   {
      $product = Product::create($request->all());

      if ($request->hasFile('product_image'))
      {
         $file = $request->file('product_image')->store('public/img');
         $product->image()->create([ 'url' => $file ]);
      }

      return redirect()->route('products.search');
   }
   
   /**
   * Display the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
   public function show(Product $product)
   {
      //
   }
   
   /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
   public function edit(Product $product)
   {
      return view('products.edit')->with('product', $product);
   }
   
   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
   public function update(UpdateProductRequest $request, Product $product)
   {
      $product->code = $request->code;
      $product->description = $request->description;
      $product->status = $request->status;
      $product->save();

      if (! $request->keep_image)
      {
         if ($product->image)
            Storage::delete($product->image->url);

         if ($request->has('product_image'))
         {
            $newFile = request()->file('product_image')->store('public/img');
            if ($product->image)
            {
               $product->image()->update([ 'url' => $newFile ]);
            }
            else
            {
               $product->image()->create(['url' => $newFile]);
            }
         }
         elseif ($product->image)
         {
            $product->image()->delete();
         }
      }

      return redirect()->route('products.search');
   }
   
   /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Product  $product
   * @return \Illuminate\Http\Response
   */
   public function destroy(Product $product)
   {
      //
   }
}

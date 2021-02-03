<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart', [
            'cart' => auth()->user()->cart ?? new Cart
        ]);
    }
}

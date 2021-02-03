<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class ProductArray extends Component
{
    public $products;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->products = Product::take(18)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product-array');
    }
}

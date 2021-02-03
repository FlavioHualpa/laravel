<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\NumberFormatter;
use App\Models\Product;

class CartItem extends Component
{
    public $product;

    protected $listeners = [
        'cartUpdated'
    ];

    public function render()
    {
        return view('livewire.cart-item');
    }

    public function getPriceProperty()
    {
        return NumberFormatter::currency($this->product->price);
    }

    public function getSubTotalProperty()
    {
        return NumberFormatter::currency(
            $this->product->price * $this->product->detail->quantity
        );
    }

    public function cartUpdated()
    {
        $this->product = auth()->user()->cart
            ->products()
            ->where('product_id', $this->product->id)
            ->first();
        
        $this->emit('totalUpdated');
    }
}

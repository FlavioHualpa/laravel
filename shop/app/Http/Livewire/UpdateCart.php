<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UpdateCart extends Component
{
    public $qtyInCart;
    public $productId;
    public $cart;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->cart = auth()->user()->cart;

        $this->qtyInCart = optional(
            optional($this->cart)->item($productId)
            )->quantity ?? 0;
    }

    public function render()
    {
        return view('livewire.update-cart');
    }

    public function addProduct()
    {
        if (empty($this->cart))
            $this->cart = auth()->user()->createCart();
        
        $this->cart->addProduct($this->productId);
        $this->qtyInCart++;
        $this->emit('cartUpdated');
    }

    public function substractProduct()
    {
        if ($this->qtyInCart > 0)
        {
            $this->cart->subtractProduct($this->productId);
            $this->qtyInCart--;
            $this->emit('cartUpdated');
        }
    }
}

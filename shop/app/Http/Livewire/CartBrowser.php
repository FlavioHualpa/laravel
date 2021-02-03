<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartBrowser extends Component
{
    public $cart;
    public $total;

    protected $listeners = [
        'totalUpdated' => 'updateTotal'
    ];
    
    public function mount()
    {
        $this->updateTotal();
    }

    public function render()
    {
        return view('livewire.cart-browser');
    }

    public function updateTotal()
    {
        $this->cart->refresh();
        $this->total = $this->cart->total();
        // dd($this->total);
    }
}

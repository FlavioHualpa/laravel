<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $itemsCount;

    protected $listeners = [
        'cartUpdated'
    ];

    public function mount()
    {
        $this->cartUpdated();
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function cartUpdated()
    {
        $this->itemsCount = optional(auth()->user()->cart)->itemsCount() ?? '0';
    }
}

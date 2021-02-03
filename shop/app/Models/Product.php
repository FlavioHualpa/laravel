<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'photo',
        'price',
    ];

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class)
            ->withPivot(['quantity', 'price'])
            ->withTimeStamps()
            ->using(ProductPurchase::class)
            ->as('detail');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)
            ->withPivot(['quantity'])
            ->withTimeStamps()
            ->using(CartProduct::class)
            ->as('detail');
    }
}

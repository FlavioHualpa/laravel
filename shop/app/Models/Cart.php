<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['quantity'])
            ->withTimeStamps()
            ->using(CartProduct::class)
            ->as('detail');
    }

    public function item($product_id)
    {
        return $this->products()
            ->where('products.id', $product_id)
            ->first()
            ?->detail;
    }

    public function itemsCount()
    {
        return $this->products()->sum('quantity');
    }

    public function total()
    {
        return $this->products()->sum(DB::raw('price * quantity'));

        return $this->products->sum(function ($product) {
            return $product->price * $product->detail->quantity;
        });
    }

    public function addProduct($productId)
    {
        if ($item = $this->item($productId))
        {
            $item->quantity++;
            $item->save();
        }
        else
        {
            $this->products()->attach(
                $productId,
                [ 'quantity' => 1 ]
            );
        }
    }

    public function subtractProduct($productId)
    {
        if ($item = $this->item($productId))
        {
            if ($item->quantity > 1)
            {
                $item->quantity--;
                $item->save();
            }
            else
            {
                $this->products()->detach(
                    $productId
                );
            }
        }
    }
}

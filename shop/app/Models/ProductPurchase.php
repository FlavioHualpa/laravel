<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductPurchase extends Pivot
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}

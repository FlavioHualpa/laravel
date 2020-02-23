<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function formattedPrice()
    {
        return '$ ' . number_format($this->price, 0, ',', '.');
    }
}

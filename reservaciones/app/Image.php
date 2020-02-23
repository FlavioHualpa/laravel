<?php

namespace App;

use App\Menu;
use App\RoomType;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url',
        'imageable_id',
        'imageable_type',
    ];

    public function user()
    {
        return $this->morphTo(User::class, 'imageable');
    }

    public function menu()
    {
        return $this->morphTo(Menu::class, 'imageable');
    }

    public function roomType()
    {
        return $this->morphTo(RoomType::class, 'imageable');
    }
}

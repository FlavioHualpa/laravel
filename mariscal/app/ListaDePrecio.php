<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListaDePrecio extends Model
{
    protected $fillable = [
        'nombre'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'orden', 'privado',
        'imagen', 'id_niv3', 'multiplo',
        'codigo_erp', 'codigo_access',
        'envasamiento_access', 'unidad'
    ];

    public function nivel3()
    {
        return $this->belongsTo(MenuNiv3::class, 'id_niv3');
    }

    public function getUrlImagenAttribute()
    {
        return asset('img/' . $this->imagen . '.jpg');
    }
}

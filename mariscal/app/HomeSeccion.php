<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSeccion extends Model
{
    protected $table = 'home_secciones';

    protected $fillable = [
        'id_home',
        'titulo1', 'titulo2', 'texto_boton',
        'color_boton', 'url', 'imagen', 'orden'
    ];

    public function home()
    {
        return $this->belongsTo(Home::class, 'id_home');
    }
}

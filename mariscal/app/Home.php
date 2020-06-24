<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';
    
    protected $fillable = [
        'nombre', 'orden'
    ];

    public function secciones()
    {
        return $this->hasMany(HomeSeccion::class, 'id_home');
    }
}

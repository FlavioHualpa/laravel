<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuNiv1 extends Model
{
    protected $table = "menu_niv1";
    
    protected $fillable = [
        'nombre', 'orden', 'privado'
    ];

    public function subitems()
    {
        return $this->hasMany(MenuNiv2::class, 'id_niv1');
    }

    public function publicSubitems()
    {
        return $this->hasMany(MenuNiv2::class, 'id_niv1')
            ->where('privado', 0)
            ->orderBy('orden');
    }
}

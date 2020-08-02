<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuNiv2 extends Model
{
    protected $table = "menu_niv2";

    protected $fillable = [
        'nombre', 'orden', 'privado', 'id_niv1', 'url'
    ];

    public function subitems()
    {
        return $this->hasMany(MenuNiv3::class, 'id_niv2');
    }

    public function publicSubitems()
    {
        return $this->hasMany(MenuNiv3::class, 'id_niv2')
            ->where('privado', 0)
            ->orderBy('orden');
    }
}

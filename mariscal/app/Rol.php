<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    
    protected $fillable = [
        'nombre'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getIdByName($nombre)
    {
        return self::where('nombre', 'like', $nombre)->first()->id;
    }
}

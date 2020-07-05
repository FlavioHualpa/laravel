<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
   protected $table = 'sucursales';

   protected $fillable = [
      'id_usuario',
      'domicilio',
      'localidad',
   ];

   public function user()
   {
      return $this->belongsTo(User::class, 'id_usuario');
   }
}

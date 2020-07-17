<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
   protected $table = 'domicilios';

   protected $fillable = [
      'id_usuario',
      'domicilio',
      'localidad',
      'codigo_postal',
      'telefono',
      'es_central'
   ];

   public function user()
   {
      return $this->belongsTo(User::class, 'id_usuario');
   }
}

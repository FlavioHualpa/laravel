<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model
{
   protected $fillable = [
      'codigo_erp',
      'nombre'
   ];
   
   public function usuarios()
   {
      return $this->belongsToMany(User::class, 'id_usuario');
   }
}

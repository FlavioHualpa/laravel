<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envasamiento extends Model
{
   protected $fillable = [
      'id_niv3', 'id_unidad',
      'divisor', 'orden', 'bulto'
   ];

   public function menu_nivel_3()
   {
      return $this->belongsTo(MenuNiv3::class, 'id_niv3');
   }

   public function unidad()
   {
      return $this->belongsTo(Unidad::class, 'id_unidad');
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envasamiento extends Model
{
   protected $fillable = [
      'id_niv3', 'id_unidad',
      'divisor', 'orden',
      'bulto', 'es_interno'
   ];

   public function menu_nivel_3()
   {
      return $this->belongsTo(MenuNiv3::class, 'id_niv3');
   }

   public function unidad()
   {
      return $this->belongsTo(Unidad::class, 'id_unidad');
   }

   public static function divisor($id_niv3, $id_unidad)
   {
      $env = self::where([
         'id_niv3' => $id_niv3,
         'id_unidad' => $id_unidad,
      ])->first();

      return $env ? $env->divisor : null;
   }
}

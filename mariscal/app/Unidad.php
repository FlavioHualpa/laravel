<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
   protected $table = 'unidades';

   protected $fillable = [
      'nombre'
   ];

   public function envasamientos()
   {
      return $this->hasMany(Envasamiento::class, 'id_unidad');
   }

   public static function getIdByName($nombre)
   {
      return self::where('nombre', 'like', $nombre)->first()->id;
   }
}

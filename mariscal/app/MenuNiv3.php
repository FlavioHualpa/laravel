<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuNiv3 extends Model
{
   protected $table = "menu_niv3";
   
   protected $fillable = [
      'nombre', 'imagen', 'orden', 'privado', 'id_niv2', 'url'
   ];
   
   public function subitems()
   {
      return $this->hasMany(Producto::class, 'id_niv3');
   }
   
   public function publicSubitems()
   {
      return $this->hasMany(Producto::class, 'id_niv3')
         ->where('privado', 0)
         ->orderBy('orden');
   }

   public function envasamientos()
   {
      return $this->hasMany(Envasamiento::class, 'id_niv3');
   }

   public function unidad()
   {
      return $this->belongsTo(Unidad::class, 'id_unidad');
   }
}

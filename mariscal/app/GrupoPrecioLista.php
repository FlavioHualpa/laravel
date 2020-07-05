<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GrupoPrecioLista extends Pivot
{
   protected $table = 'grupo_precio_lista';

   protected $fillable = [
      'id_lista', 'id_grupo_precio', 'precio'
   ];
}

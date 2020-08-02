<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cubitaje extends Model
{
   protected $fillable = [
      'id_grupo_precio',
      'kilos',
      'metros'
   ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModificacionDetallePedido extends Model
{
   protected $table = "modificacion_pedido_producto";

   protected $fillable = [
      'id_pedido_producto',
      'id_estado_pedido',
      'tipo',
      'valor_anterior',
      'valor_nuevo',
      'created_at',
   ];
}

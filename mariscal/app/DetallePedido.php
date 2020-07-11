<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DetallePedido extends Pivot
{
   protected $table = 'pedido_producto';

   protected $fillable = [
      'id_pedido',
      'id_producto',
      'cantidad',
      'precio'
   ];

   public function pedido()
   {
      return $this->belongsTo(Pedido::class, 'id_pedido');
   }

   public function producto()
   {
      return $this->belongsTo(Producto::class, 'id_producto');
   }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
   protected $fillable = [
      'id_usuario',
      'id_cliente',
      'id_enviante',
      'id_domicilio',
      'id_transporte',
      'id_estado',
      'numero',
      'mensaje',
      'sent_at',
   ];

   protected $casts = [
      'sent_at' => 'datetime',
   ];

   public function usuario()
   {
      return $this->belongsTo(User::class, 'id_usuario');
   }

   public function cliente()
   {
      return $this->belongsTo(User::class, 'id_cliente');
   }

   public function enviante()
   {
      return $this->belongsTo(User::class, 'id_enviante');
   }

   public function domicilio()
   {
      return $this->belongsTo(Domicilio::class, 'id_domicilio');
   }

   public function transporte()
   {
      return $this->belongsTo(Transporte::class, 'id_transporte');
   }

   public function estado()
   {
      return $this->belongsTo(EstadoPedido::class, 'id_estado');
   }

   public function productos()
   {
      return $this->belongsToMany(
         Producto::class,
         'pedido_producto',
         'id_pedido',
         'id_producto')
         ->withPivot(['cantidad', 'precio'])
         ->using(DetallePedido::class)
         ->as('detalle');
   }

   public static function inputQuantity(Producto $prod)
   {
      $customer = User::getCurrentCustomer();

      $pedido = self::where('id_cliente', $customer->id)
         ->where('id_estado', EstadoPedido::getIdByName('abierto'))
         ->first();

      if (! $pedido)
         return 0;

      $item = $pedido->productos()
         ->wherePivot('id_producto', $prod->id)
         ->first();
      
      if (! $item)
         return 0;

      return $item->detalle->cantidad;
   }

   public function getTotalNetoAttribute()
   {
      return $this->productos->sum(
         function ($item) {
            return $item->detalle->cantidad * $item->detalle->precio;
         }
      );
   }

   public function getTotalBultosAttribute()
   {
      $categorias = $this->productos()->pluck('id_niv3')->unique();
      $totalBultos = 0;

      foreach ($categorias as $categoria)
      {
         $env = Envasamiento::where([
               'id_niv3' => $categoria,
               'bulto' => 1,
            ])->first();
         
         $divisor = ($env ? $env->divisor : 1);

         $totalUnidades = $this->productos()
            ->where('id_niv3', $categoria)
            ->sum('cantidad');
         
         $totalBultos += ceil($totalUnidades / $divisor);
      }

      return $totalBultos;
   }

   public function getTotalKilosAttribute()
   {
      return $this->productos->sum(
         function ($item) {
            return $item->detalle->cantidad * $item->peso;
         }
      );
   }

   public function getTotalMetrosAttribute()
   {
      return $this->productos->sum(
         function ($item) {
            return $item->detalle->cantidad * $item->volumen;
         }
      );
   }

   public function getSePuedeModificarAttribute()
   {
      return $this->id_estado == EstadoPedido::getIdByName('cerrado')
         || $this->id_estado == EstadoPedido::getIdByName('en preparación');
   }
}

<?php

namespace App;

use App\GrupoPrecioLista;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
   protected $fillable = [
      'nombre', 'orden', 'privado',
      'imagen', 'id_niv3', 'multiplo',
      'codigo_erp', 'codigo_access',
      'envasamiento_access', 'unidad',
      'id_grupo_precio'
   ];
   
   public function nivel3()
   {
      return $this->belongsTo(MenuNiv3::class, 'id_niv3');
   }

   public function cubitaje()
   {
      return $this->belongsTo(
         Cubitaje::class,
         'id_grupo_precio',
         'id_grupo_precio'
      );
   }
   
   public function pedidos()
   {
      return $this->belongsToMany(
         Pedido::class,
         'pedido_producto',
         'id_producto',
         'id_pedido')
         ->withPivot(['id', 'cantidad', 'precio'])
         ->using(DetallePedido::class)
         ->as('detalle');
   }

   public function getUrlImagenAttribute()
   {
      return asset('img/' . $this->imagen . '.jpg');
   }

   public function getDivisorBultoAttribute()
   {
      return ($env = $this->nivel3
         ->envasamientos()
         ->where('bulto', 1)
         ->first())
         ? $env->divisor
         : 1;
   }

   public function getPesoAttribute()
   {
      return $this->cubitaje->kilos;
   }

   public function getVolumentAttribute()
   {
      return $this->cubitaje->metros;
   }

   public function precio($idLista)
   {
      $producto = GrupoPrecioLista::where([
         [ 'id_lista', $idLista ],
         [ 'id_grupo_precio', $this->id_grupo_precio ],
      ])
      ->first();
      
      return $producto ? $producto->precio : 0.0;
   }
}

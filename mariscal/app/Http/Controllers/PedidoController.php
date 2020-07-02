<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\EstadoPedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
   public function __contruct()
   {
      $this->middleware('auth');
   }

   public function addItem(Request $request)
   {
      if (! $request->id_cliente
         || ! $request->id_producto
         || ! $request->cantidad)
      {
         return ['respuesta' => 'Petición inválida'];
      }

      $pedido = Pedido::firstOrCreate(

         // el primer array son los campos de búsqueda
         [
            'id_cliente' => $request->id_cliente,
            'id_estado' => EstadoPedido::getIdByName('abierto')
         ],

         // el segundo array son los datos para crear el nuevo pedido
         [
            'id_usuario' => auth()->id(),
            'numero' => Pedido::max('numero') + 1
         ]
      );

      $pedido->productos()->sync(
         [ $request->id_producto => [ 'cantidad' => $request->cantidad ] ],
         false // false quiere decir no eliminar los demás productos
      );

      return [ 'respuesta' => 'Pedido actualizado' ];
   }

   public function removeItem(Request $request)
   {
      if (! $request->id_cliente || ! $request->id_producto)
      {
         return ['respuesta' => 'Petición inválida'];
      }

      $pedido = Pedido::where(
         [
            'id_cliente' => $request->id_cliente,
            'id_estado' => EstadoPedido::getIdByName('abierto')
         ]
      )->first();

      $pedido->productos()->detach($request->id_producto);
   }
}

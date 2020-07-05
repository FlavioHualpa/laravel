<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Envasamiento;
use App\EstadoPedido;
use App\MenuNiv3;
use App\Unidad;
use App\User;
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

   public function showCart()
   {
      // obtengo los productos del pedido abierto
      // para el cliente de la sesión
      $pedido = Pedido::where(
         [ 'id_cliente' => session(config('auth.session_customer_key'))->id ],
         [ 'id_estado' => EstadoPedido::getIdByName('abierto') ],
      )->first();

      // si el cliente no tiene un pedido abierto
      // entonces devuelvo un array vacío
      $productos = $pedido ? $pedido->productos : collect([]);

      // luego extraigo el id de las categorías (nivel 3)
      // de los productos (valores sin repetir)
      $grupos = $productos
         ->pluck('id_niv3')
         ->unique();

      // finalmente obtengo la colección de las categorías
      // ordenadas por nombre, que van a ser los títulos
      // para agrupar los productos en el carrito
      $encabezados = MenuNiv3::select('id', 'nombre', 'url')
         ->whereIn('id', $grupos)
         ->orderBy('nombre')
         ->get();
      
      $cliente = User::getCurrentCustomer();

      return view('carrito')->with([
         'productos' => $productos,
         'encabezados' => $encabezados,
         'cliente' => $cliente,
      ]);
   }

   public function getOrderTotals()
   {
      // obtengo los productos del pedido abierto
      // para el cliente de la sesión
      $pedido = Pedido::where(
         [ 'id_cliente' => session(config('auth.session_customer_key'))->id ],
         [ 'id_estado' => EstadoPedido::getIdByName('abierto') ],
      )->first();

      // si el cliente no tiene un pedido abierto
      // entonces devuelvo cero en los totales
      if (empty($pedido))
         return [ 'paquetes' => 0, 'bultos' => 0 ];
      
      $productos = $pedido->productos;

      // luego extraigo el id de las categorías (nivel 3)
      // de los productos (valores sin repetir)
      $grupos = $productos
         ->pluck('id_niv3')
         ->unique();

      $id_paquetes = Unidad::getIdByName('paquetes');
      $id_bultos = Unidad::getIdByName('bultos');

      // return "$id_paquetes, $id_bultos";

      $totalPaquetes = 0;
      $totalBultos = 0;

      foreach($grupos as $id_grupo)
      {
         // sumo la cantidad de unidades
         // pedidas para cada grupo
         $totalUnidades = $productos
            ->where('id_niv3', $id_grupo)
            ->sum('detalle.cantidad');

         // acumulo el total de paquetes
         $divisor = Envasamiento::divisor($id_grupo, $id_paquetes);
         if ($divisor)
            $totalPaquetes += $totalUnidades / $divisor;

         // acumulo el total de bultos
         $divisor = Envasamiento::divisor($id_grupo, $id_bultos);
         if ($divisor)
            $totalBultos += $totalUnidades / $divisor;
      }

      // devuelvo los totales en formato json
      return [
         'paquetes' => $totalPaquetes,
         'bultos' => $totalBultos,
      ];
   }

   public function getCategoryTotals(Request $request)
   {
      if (! $request->id_niv3)
         return [ 'respuesta' => 'Petición inválida' ];
      
      // obtengo los productos del pedido abierto
      // para el cliente de la sesión
      $pedido = Pedido::where(
         [ 'id_cliente' => session(config('auth.session_customer_key'))->id ],
         [ 'id_estado' => EstadoPedido::getIdByName('abierto') ],
      )->first();

      // si el cliente no tiene un pedido abierto
      // entonces devuelvo cero en los totales
      if (empty($pedido))
         return [ 'respuesta' => 'El cliente no tiene un pedido abierto' ];
      
      // me interesan los productos de la categoría
      // solicitada en request->id_niv3
      $productos = $pedido
         ->productos()
         ->where('id_niv3', $request->id_niv3)
         ->get();

      $totales = [];
      $totalUnidades = $productos->sum('detalle.cantidad');

      // solo los envasamientos para la categoría solicitada
      $envasamientos = Envasamiento::with('unidad')
         ->where('id_niv3', $request->id_niv3)
         ->get();

      // calculo los totales de c/envasamiento
      foreach ($envasamientos as $env)
      {
         $totales[$env->unidad->nombre] = $totalUnidades / $env->divisor;
      }

      // retorno el array
      return $totales;
   }
}

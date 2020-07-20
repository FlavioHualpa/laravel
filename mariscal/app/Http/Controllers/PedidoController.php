<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Producto;
use App\Envasamiento;
use App\EstadoPedido;
use App\MenuNiv3;
use App\Unidad;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
   public function __construct()
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

      $precio = Producto::find($request->id_producto)
         ->precio($pedido->cliente->id_lista);

      $pedido->productos()->sync(
         [ $request->id_producto => [
            'cantidad' => $request->cantidad,
            'precio' => $precio ]
         ],
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

      $pedido = Pedido::where([
            'id_cliente' => $request->id_cliente,
            'id_estado' => EstadoPedido::getIdByName('abierto')
         ])->first();

      $pedido->productos()->detach($request->id_producto);

      if ($pedido->productos()->count() == 0)
         $pedido->delete();

      return [ 'respuesta' => 'Pedido actualizado' ];
   }

   public function showCart()
   {
      // obtengo los productos del pedido abierto
      // para el cliente de la sesión
      $pedido = $this->getOpenOrder();
      
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
      $pedido = $this->getOpenOrder();

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
      $pedido = $this->getOpenOrder();

      // solo los envasamientos para la categoría solicitada
      $envasamientos = Envasamiento::with('unidad')
         ->where('id_niv3', $request->id_niv3)
         ->get();

      $totales = [];

      // si el cliente no tiene un pedido abierto
      // entonces devuelvo cero en los totales
      if (empty($pedido))
      {
         // inicializo los totales de c/envasamiento
         foreach ($envasamientos as $env)
         {
            $totales[$env->unidad->nombre] = 0;
         }
      }
      else
      {
         // me interesan los productos de la categoría
         // solicitada en request->id_niv3
         $productos = $pedido
            ->productos()
            ->where('id_niv3', $request->id_niv3)
            ->get();

         $totalUnidades = $productos->sum('detalle.cantidad');

         // calculo los totales de c/envasamiento
         foreach ($envasamientos as $env)
         {
            $totales[$env->unidad->nombre] = $totalUnidades / $env->divisor;
         }
      }

      // retorno el array
      return $totales;
   }

   public function closeOrder(Request $request)
   {
      // obtengo los productos del pedido abierto
      // para el cliente de la sesión y completo
      // los datos para proceder a cerrar
      $pedido = $this->getOpenOrder();
      $pedido->id_domicilio = $request->id_domicilio;
      $pedido->id_transporte = $request->id_transporte;
      $pedido->id_enviante = auth()->id();
      $pedido->id_estado = EstadoPedido::getIdByName('cerrado');
      $pedido->mensaje = $request->mensaje;
      $pedido->sent_at = now();
      $pedido->save();

      return $this->sendMails($pedido);
   }

   private function sendMails(Pedido $pedido)
   {
      $encabezados = MenuNiv3::select('id', 'nombre')
         ->whereIn('id', $pedido->productos()->pluck('id_niv3')->unique())
         ->orderBy('nombre')
         ->get();
      
      $mail = (new \App\Mail\NuevoPedidoEnviado($pedido, $encabezados))
               ->subject('Pedido Enviado #' . $pedido->numero);
      
      // Enviamos mail a:
      // 1. El que inicia el pedido
      // 2. El que envía el pedido
      // 3. info@ajmechet

      $mariscal = User::where('cuit', '30500216111')->first();

      $destinatario = $pedido->usuario;
      $conCopia = [];

      if ($pedido->id_enviante != $pedido->id_usuario)
         $conCopia[] = $pedido->enviante;

      if ($mariscal->id != $pedido->id_usuario
         && $mariscal->id != $pedido->id_enviante)
         $conCopia[] = $mariscal;
      
      Mail::to($destinatario)
         ->bcc($conCopia)
         ->send($mail);
      
      return [ 'resultado' => 'Emails enviados!' ];
   }

   public function deleteOrder()
   {
      $pedido = $this->getOpenOrder();

      if (empty($pedido))
         return;
      
      $pedido->productos()->detach();
      $pedido->delete();

      return [ 'resultado' => 'Pedido eliminado!' ];
   }

   private function getOpenOrder()
   {
      return Pedido::where([
         'id_cliente' => User::getCurrentCustomer()->id,
         'id_estado' => EstadoPedido::getIdByName('abierto')
      ])->first();
   }

   public function showConfirmation()
   {
      return view('enviado');
   }

   public function checkOpenOrder(Request $request)
   {
      $pedido = Pedido::findOrFail($request->id_pedido);
      $hasOpenOrder = Pedido::where('id_cliente', $pedido->id_cliente)
         ->where('id_estado', EstadoPedido::getIdByName('abierto'))
         ->exists();

      return [
         'customerName' => $pedido->cliente->razon_social,
         'hasOpenOrder' => $hasOpenOrder
      ];
   }
}

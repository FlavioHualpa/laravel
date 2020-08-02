<?php

namespace App\Http\Controllers;

use App\Envasamiento;
use App\EstadoPedido;
use App\MenuNiv3;
use App\Pedido;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   protected $orderByOptions;
   protected $itemsPerPageOptions;
   protected $estadoIds;

   public function __construct()
   {
      $this->middleware('auth');
      $this->middleware('can:manage');

      $this->orderByOptions = [
         'name' => 'Razón Social',
         'sent' => 'Fecha de Envío',
      ];

      $this->itemsPerPageOptions = [
         10, 25, 50
      ];

      $this->estadoIds = [
         '1' => EstadoPedido::getIdByName('cerrado'),
         '2' => EstadoPedido::getIdByName('en preparación'),
         '3' => EstadoPedido::getIdByName('facturado'),
         '4' => EstadoPedido::getIdByName('despachado'),
         '5' => EstadoPedido::getIdByName('cancelado'),
      ];
   }

   public function index()
   {
      return 'Hola Gestión!';
   }

   public function manageOrders(Request $request)
   {
      $pedidos = $this->getOrders($request);
      $activePage = $this->getTabFromQueryString($request);

      return view('admin.orders', [
         'pedidos' => $pedidos,
         'titulo' => 'Administración de pedidos',
         'activePage' => $activePage,
         'orderByOptions' => $this->orderByOptions,
         'itemsPerPageOptions' => $this->itemsPerPageOptions,
      ]);
   }

   private function getTabFromQueryString(Request $request)
   {
      return ($tab = $request->tab) && isset($this->estadoIds[$tab])
         ? $tab
         : '1';
   }

   private function getOrders(Request $request)
   {
      $usuario = auth()->user();

      $pedidos = Pedido::select('id', 'numero',
         'id_cliente', 'id_domicilio',
         'id_estado', 'sent_at')
         ->addSelect([
            'razon_social' => User::select('razon_social')
               ->whereColumn('pedidos.id_cliente', 'users.id')
               ->limit(1)])
         ->with(['cliente', 'domicilio', 'estado']);
      
      if ($request->filter)
      {
         $pedidos = $pedidos
            ->where('razon_social', 'like', "%$request->filter%");
      }

      switch (strtolower($request->order))
      {
         case 'name':
         default:
            $pedidos = $pedidos
               ->orderBy('razon_social')
               ->orderBy('sent_at', 'desc');
         break;

         case 'sent':
            $pedidos = $pedidos
               ->orderBy('sent_at', 'desc')
               ->orderBy('razon_social');
         break;
      }

      $perPage = intval($request->results);
      if (array_search($perPage, $this->itemsPerPageOptions) === false)
         $perPage = 10;
      
      switch ($usuario->rol->nombre)
      {
         case 'Administrador':
            $clientes = User::whereNotNull('id_vendedor')
               ->pluck('id')
               ->unique();
            $pedidos = $pedidos
               ->whereIn('id_cliente', $clientes);
         break;

         case 'Vendedor':
            $clientes = User::where('id_vendedor', $usuario->id)
               ->pluck('id')
               ->unique();
            $pedidos = $pedidos
               ->whereIn('id_cliente', $clientes);
         break;

         default:
            $pedidos = $pedidos
               ->where('id_cliente', $usuario->id);
         break;
      }

      $tab = $this->getTabFromQueryString($request);

      $pedidos = $pedidos
         ->where('id_estado', $this->estadoIds[$tab])
         ->paginate($perPage);

      return $pedidos;
   }

   public function printOrder(Request $request, Pedido $pedido)
   {
      $niveles = $pedido->productos()
         ->pluck('id_niv3')
         ->unique();
      
      // $encabezados = MenuNiv3::whereIn('id', $niveles)
      //    ->orderBy('nombre')
      //    ->get();

      $secciones = [];

      // las secciones para imprimir la boleta
      // tienen este formato:
      // [
      //   [
      //     'encabezado' => string,
      //     'grupos' => [
      //       [
      //         'bultos' => string,
      //         'unidades' => string,
      //         'articulos' => [ Producto, Producto, ... ],
      //       ],
      //       [
      //         'bultos' => string,
      //         'unidades' => string,
      //         'articulos' => [ Producto, Producto, ... ],
      //       ],
      //       ...
      //     ],
      //   ],
      //   [
      //     'encabezado' => string,
      //     'grupos' => [
      //       ...
      //     ],
      //   ],
      // ]

      foreach ($niveles as $nivel)
      {
         $grupos = $this->generateGroups($pedido, $nivel);

         $secciones[] = [
            'encabezado' => MenuNiv3::find($nivel)->nombre,
            'grupos' => $grupos,
         ];
      }

      return view('admin.print', [
         'pedido' => $pedido,
         'secciones' => $secciones,
      ]);
   }

   private function generateGroups($pedido, $nivel)
   {
      $grupos = [];

      $cantidades = $pedido->productos()
         ->where('id_niv3', $nivel)
         ->orderByDesc('pedido_producto.cantidad')
         ->pluck('pedido_producto.cantidad')
         ->unique();
      
      $divisor = ($env = Envasamiento::where('id_niv3', $nivel)
         ->where('bulto', 1)
         ->first())
         ? $env->divisor
         : 1;
      
      foreach ($cantidades as $cantidad)
      {
         $productos = $pedido->productos()
            ->where('id_niv3', $nivel)
            ->where('cantidad', $cantidad)
            ->get();
         
         $bultosCerrados = floor($cantidad / $divisor);
         $sobrante = $cantidad % $divisor;

         $grupos[] = [

            'cerrados' => $bultosCerrados,

            'sobrante' => $sobrante,

            'unidades' => $cantidad,  // el total de unidades por articulo

            'cantidad' => $productos->count(),  // cuántos artículos distintos

            'bultos' => "$bultosCerrados B" . ($sobrante ? " + $sobrante U" : "") . " c/u",

            'unidades' => "$cantidad c/u",

            'articulos' => $productos
         
         ];
      }

      return $grupos;
   }
}

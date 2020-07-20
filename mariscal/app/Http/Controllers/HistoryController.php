<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index(Request $request)
   {
      $usuario = auth()->user();

      $semiQuery = Pedido::select('pedidos.id',
         'pedidos.numero',
         'users.razon_social',
         'pedidos.sent_at',
         'pedidos.id_estado')
         ->join('users', 'users.id', 'pedidos.id_cliente')
         ->with('estado');
      
      if ($request->filter)
      {
         $semiQuery = $semiQuery
            ->where('razon_social', 'like', "%$request->filter%");
      }

      switch (strtolower($request->order))
      {
         case 'name':
         default:
            $semiQuery = $semiQuery
               ->orderBy('razon_social')
               ->orderBy('sent_at', 'desc');
         break;

         case 'sent':
            $semiQuery = $semiQuery
               ->orderBy('sent_at', 'desc')
               ->orderBy('razon_social');
         break;
      }

      $perPage = intval($request->results);
      if ($perPage != 10 && $perPage != 25 && $perPage != 50)
         $perPage = 10;
      
      // $semiQuery = $semiQuery->paginate($perPage);

      switch ($usuario->rol->nombre)
      {
         case 'Administrador':
            $clientes = User::whereNotNull('id_vendedor')
               ->pluck('id')
               ->unique();
            $pedidos = $semiQuery
               ->whereIn('id_cliente', $clientes)
               ->paginate($perPage);
            $titulo = "Todos los pedidos enviados";
         break;

         case 'Vendedor':
            $clientes = User::where('id_vendedor', $usuario->id)
               ->pluck('id')
               ->unique();
            $pedidos = $semiQuery
               ->whereIn('id_cliente', $clientes)
               ->paginate($perPage);
            $titulo = "Pedidos enviados por " . $usuario->razon_social;
         break;

         default:
            $pedidos = $semiQuery
               ->where('id_cliente', $usuario->id)
               ->paginate($perPage);
            $titulo = "Pedidos para " . $usuario->razon_social;
         break;
      }

      return view('historial', [
         'usuario' => $usuario,
         'pedidos' => $pedidos,
         'titulo' => $titulo,
      ]);
   }
}

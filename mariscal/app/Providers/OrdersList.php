<?php

namespace App\Providers;

use App\Pedido;
use App\User;
use Illuminate\Http\Request;

class OrdersList
{
   public function withFilters(Request $request)
   {
      $usuario = auth()->user();

      $semiQuery = Pedido::select('pedidos.id',
         'pedidos.numero',
         'users.razon_social',
         'pedidos.sent_at',
         'pedidos.id_domicilio',
         'pedidos.id_estado')
         ->join('users', 'users.id', 'pedidos.id_cliente')
         ->with(['domicilio', 'estado']);
      
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
      if (array_search($perPage, $resultsPerPage) === false)
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
         break;

         case 'Vendedor':
            $clientes = User::where('id_vendedor', $usuario->id)
               ->pluck('id')
               ->unique();
            $pedidos = $semiQuery
               ->whereIn('id_cliente', $clientes)
               ->paginate($perPage);
         break;

         default:
            $pedidos = $semiQuery
               ->where('id_cliente', $usuario->id)
               ->paginate($perPage);
         break;
      }
   }
}

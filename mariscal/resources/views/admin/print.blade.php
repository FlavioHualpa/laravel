<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/printorder.css') }}">
   <title>Nota de Pedido - S. Ajmechet e Hijos S.A.</title>
</head>
<body>
   <div class="container">
      <h5>S. Ajmechet e Hijos S.A.</h5>
      <div class="flex-between">
         <h3>NOTA DE PEDIDO</h3>
         <h4>{{ \App\LocalFormatter::date($pedido->sent_at) }}</h4>
      </div>

      <div class="separator"></div>

      {{-- DATOS DEL PEDIDO --}}
      <table>
         <tbody>
            <tr>
               <td class="stand-out">
                  CLIENTE:
               </td>
               <td class="stand-out">
                  <strong>
                     {{ $pedido->cliente->codigo_erp }}
                  </strong>
               </td>
               <td class="stand-out">
                  PEDIDO Nº:
               </td>
               <td class="stand-out">
                  <strong>
                     {{ $pedido->numero }}
                  </strong>
               </td>
            </tr>
            <tr>
               <td>
                  RAZÓN SOCIAL:
               </td>
               <td colspan="3">
                  <strong>
                     {{ $pedido->cliente->razon_social }}
                  </strong>
               </td>
            </tr>
            <tr>
               <td>
                  DIRECCIÓN:
               </td>
               <td>
                  <strong>
                     {{ $pedido->cliente->domicilio->domicilio }}
                  </strong>
               </td>
               <td>
                  LOCALIDAD:
               </td>
               <td>
                  <strong>
                     {{ $pedido->cliente->domicilio->localidad }}
                  </strong>
               </td>
            </tr>
            <tr>
               <td class="stand-less">
                  CUIT:
               </td>
               <td class="stand-less">
                  <strong>
                     {{ $pedido->cliente->cuit }}
                  </strong>
               </td>
               <td class="stand-less">
                  TELÉFONO:
               </td>
               <td class="stand-less">
                  <strong>
                     {{ $pedido->cliente->domicilio->telefono }}
                  </strong>
               </td>
            </tr>
            <tr>
               <td class="stand-less">
                  VENDEDOR:
               </td>
               <td class="stand-less">
                  <strong>
                     @if ($pedido->cliente->vendedor)
                     {{ $pedido->cliente->vendedor->razon_social }}
                     @else
                     ----
                     @endif
                  </strong>
               </td>
               <td class="stand-less">
                  MARCA:
               </td>
               <td class="stand-less">
                  <strong>
                     {{ $pedido->cliente->marca }}
                  </strong>
               </td>
            </tr>
         </tbody>
      </table>

      {{-- DATOS DE ENTREGA --}}
      <h5 class="mt-4">
         Dirección de entrega:
         {{ $pedido->domicilio->domicilio }}
         ({{ $pedido->domicilio->localidad }})
      </h5>
      <h5>
         Transporte:
         {{ $pedido->transporte->nombre }}
         @if ($pedido->transporte->domicilio)
         ({{ $pedido->transporte->domicilio }})
         @endif
      </h5>

      {{-- GRUPOS DE ARTÍCULOS --}}
      <table class="products mt-4">
         <tbody>
            <tr>
               <td style="width: 3cm;">
                  Bultos
               </td>
               <td style="width: 2cm;">
                  Unidades
               </td>
               <td style="width: 14cm;">
                  Variedades
               </td>
            </tr>

            @foreach ($secciones as $seccion)
            <tr>
               <td colspan="3" class="bt-2">
                  <h5 style="margin-bottom: 0">
                     {{ $seccion['encabezado'] }}
                  </h5>
               </td>
            </tr>
            @foreach ($seccion['grupos'] as $grupo)
            <tr>
               <td>
                  {{ $grupo['bultos'] }}
               </td>
               <td>
                  {{ $grupo['unidades'] }}
               </td>
               <td>
                  @foreach ($grupo['articulos'] as $item)
                     <div>
                        <i class="fa fa-square-o" aria-hidden="true"></i>
                        <span>{{ $item->nombre }}</span>
                     </div>
                  @endforeach
               </td>
            </tr>
            @endforeach
            <tr>
               <td colspan="3">
                  {!! $seccion['totales'] !!}
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>

      <section class="totales">
         <h5 class="mt-4">
            <u>TOTALES:</u>
         </h5>
         <p class="mt-4">
            BULTOS = {{ $totalesGenerales['bultos'] }}
            Preparado: ________
         </p>
         <p>
            PESO = {{ $totalesGenerales['kilos'] }}
         </p>
         <p>
            VOLUMEN = {{ $totalesGenerales['metros'] }}
         </p>
         <h5 class="mt-4">
            Nombre Responsable ___________________________
            Control ___________________________
         </h5>
      </section>
   </div>
</body>
</html>

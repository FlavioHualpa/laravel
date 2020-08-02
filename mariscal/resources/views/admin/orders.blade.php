@extends('layouts.main')

@section('content')

      <!-- Orders Wrapper Start -->
      <div
         id="content"
         class="main-content-wrapper"
      >
         <div class="page-content-inner">
            <div class="container">
               <h2 class="mt--40 titulo-carrito">
                  {{ $titulo }}
               </h2>
               
               <div class="row pt--40 pb--80 pt-sm--25 pb-md--60 pb-sm--40">
                  
                  <div class="col mb-md--30">

                     <div class="alert alert-secondary mb-5">
                        <form action="{{ route('admin.orders') }}" class="list-options">
                           <label class="text font-bold">
                              OPCIONES
                           </label>

                           <input type="hidden" name="tab" value="{{ $activePage }}">

                           <div class="my-1">
                              <input
                                 type="text"
                                 name="filter" 
                                 value="{{ request('filter') }}"
                                 placeholder="Buscar por razón social"
                                 class="text-box ml-auto mr-4"
                              >
                           </div>

                           <div class="my-1">
                              <label class="text" for="order">
                                 Ordenar por
                              </label>
                              <select
                                 name="order"
                                 id="order"
                                 class="select mr-4"
                              >
                                 @foreach ($orderByOptions as $key => $value)
                                 <option
                                    value="{{ $key }}"
                                    {{ request('order') == $key ? 'selected' : '' }}
                                 >
                                    {{ $value }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>

                           <div class="my-1">
                              <label class="text" for="results">
                                 Mostrar
                              </label>
                              <select name="results" id="results" class="select mr-4">
                                 @foreach ($itemsPerPageOptions as $value)
                                 <option
                                    value="{{ $value }}"
                                    {{ request('results') == $value ? 'selected' : '' }}
                                 >
                                    {{ $value }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>

                           <button type="submit" class="btn btn-tiny">
                              APLICAR
                           </button>
                        </form>
                     </div>

                     @if ($pedidos->total())
                     <div class="page-links">
                        <div>
                           <span class="shown-results mr-5">
                              Mostrando resultados {{ $pedidos->firstItem()}} a {{ $pedidos->lastItem() }} de {{ $pedidos->total() }}
                           </span>
                        </div>
                        <div>
                           {{ $pedidos->withQueryString()->links('pagination.links') }}
                        </div>
                     </div>
                     @endif

                     <nav>
                        <ul class="page-tabs">
                           <li @if ($activePage == '1') class="active" @endif>
                              <a href="{{ str_replace("tab=$activePage", "tab=1", route('admin.orders', request()->getQueryString())) }}">
                                 cerrados
                              </a>
                           </li>
                           <li @if ($activePage == '2') class="active" @endif>
                              <a href="{{ str_replace("tab=$activePage", "tab=2", route('admin.orders', request()->getQueryString())) }}">
                                 en preparación
                              </a>
                           </li>
                           <li @if ($activePage == '3') class="active" @endif>
                              <a href="{{ str_replace("tab=$activePage", "tab=3", route('admin.orders', request()->getQueryString())) }}">
                                 facturados
                              </a>
                           </li>
                           <li @if ($activePage == '4') class="active" @endif>
                              <a href="{{ str_replace("tab=$activePage", "tab=4", route('admin.orders', request()->getQueryString())) }}">
                                 despachados
                              </a>
                           </li>
                           <li @if ($activePage == '5') class="active" @endif>
                              <a href="{{ str_replace("tab=$activePage", "tab=5", route('admin.orders', request()->getQueryString())) }}">
                                 cancelados
                              </a>
                           </li>
                        </ul>
                     </nav>

                     <div class="table-content table-responsive">
                        <table class="table text-center">
                           <thead>
                              <tr>
                                 <th class="encabezado-listado">
                                    #
                                 </th>
                                 <th class="encabezado-listado">
                                    Cliente
                                 </th>
                                 <th class="encabezado-listado">
                                    Fecha Envío
                                 </th>
                                 <th class="encabezado-listado">
                                    Valorización
                                 </th>
                                 <th class="encabezado-listado">
                                    Bultos
                                 </th>
                                 <th class="encabezado-listado">
                                    Estado
                                 </th>
                                 <th class="encabezado-listado">
                                    Acción
                                 </th>
                              </tr>
                           </thead>

                           <tbody>
                              @forelse ($pedidos as $pedido)

                              <tr style="border-bottom: 1px solid #c8c8c8;">
                                 <td class="dato-listado">
                                    {{ $pedido->numero }}
                                 </td>

                                 <td class="dato-listado">
                                    <span class="dato-destacado">
                                       {{ $pedido->razon_social }}
                                    </span>
                                    @if ($pedido->domicilio)
                                    <br>
                                    {{ $pedido->domicilio->domicilio }} -
                                    {{ $pedido->domicilio->localidad }}
                                    @endif
                                 </td>

                                 <td class="dato-listado">
                                    @if ($pedido->sent_at)
                                    {{ $pedido->sent_at->format('d/m/Y H:i') }}
                                    @endif
                                 </td>

                                 <td class="dato-listado">
                                    {{ \App\LocalFormatter::currency($pedido->totalNeto) }}
                                 </td>

                                 <td class="dato-listado">
                                    {{ \App\LocalFormatter::roundUp($pedido->totalBultos) }}
                                 </td>

                                 <td class="dato-listado">
                                    {{ $pedido->estado->nombre }}
                                 </td>

                                 <td class="dato-listado">
                                    <a href="{{ route('admin.print', $pedido->id) }}">
                                       <i
                                          class="fa fa-print"
                                          aria-hidden="true"
                                          title="Imprimir"
                                       >
                                       </i>
                                    </a>
                                    <i
                                       class="fa fa-pencil-square-o"
                                       aria-hidden="true"
                                       data-order-id="{{ $pedido->id }}"
                                       title="Modificar"
                                    >
                                    </i>
                                    <i
                                       class="fa fa-step-forward"
                                       aria-hidden="true"
                                       data-order-id="{{ $pedido->id }}"
                                       title="Cambiar Estado"
                                    >
                                    </i>
                                 </td>
                              </tr>

                              @empty

                              <tr>
                                 <td class="dato-listado" colspan="7">
                                    <h4 class="titulo-carrito">
                                       Ningún pedido en este estado
                                    </h4>
                                 </td>
                              </tr>

                              @endforelse
                           </tbody>
                        </table>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
      <!-- Orders Wrapper End -->

@endsection

{{--
<!-- Custom JS -->
@push('customjs')
<script src="{{ asset('js/historial.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush
--}}

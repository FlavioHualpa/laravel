@extends('layouts.main')

@section('content')

      <!-- History Wrapper Start -->
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

                     @if($pedidos->count())

                     <div class="alert alert-secondary mb-5">
                        <form action="{{ route('order.history') }}" class="list-options">
                           <label class="text font-bold">
                              OPCIONES
                           </label>

                           <input
                              type="text"
                              name="filter" 
                              value="{{ request('filter') }}"
                              placeholder="Buscar por razón social"
                              class="text-box ml-auto mr-4"
                           >

                           <label class="text" for="order">
                              Ordenar por
                           </label>
                           <select
                              name="order"
                              id="order"
                              class="select mr-4"
                           >
                              <option
                                 value="name"
                                 {{ request('order') == 'name' ? 'selected' : '' }}
                              >
                                 Razón Social
                              </option>
                              <option
                                 value="sent"
                                 {{ request('order') == 'sent' ? 'selected' : '' }}
                              >
                                 Fecha de envío
                              </option>
                           </select>

                           <label class="text" for="results">
                              Mostrar
                           </label>
                           <select name="results" id="results" class="select mr-4">
                              <option
                                 value="10"
                                 {{ request('results') == '10' ? 'selected' : '' }}
                              >
                                 10
                              </option>
                              <option
                                 value="25"
                                 {{ request('results') == '25' ? 'selected' : '' }}
                              >
                                 25
                              </option>
                              <option
                                 value="50"
                                 {{ request('results') == '50' ? 'selected' : '' }}
                              >
                                 50
                              </option>
                           </select>

                           <button type="submit" class="btn btn-tiny">
                              APLICAR
                           </button>
                        </form>
                     </div>

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
                                    Estado
                                 </th>
                                 <th class="encabezado-listado">
                                    Acción
                                 </th>
                              </tr>
                           </thead>

                           <tbody>
                              @foreach ($pedidos as $pedido)

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
                                    {{ $pedido->estado->nombre }}
                                 </td>

                                 <td>
                                    @if ($pedido->sent_at)
                                    <a
                                       href="#"
                                       class="btn btn-tiny"
                                       data-order-id="{{ $pedido->id }}"
                                       data-order-no="{{ $pedido->numero }}"
                                    >
                                       REPETIR
                                    </a>
                                    @endif
                                 </td>
                              </tr>

                              @endforeach
                           </tbody>
                        </table>
                     </div>

                     @else

                     <h4 class="titulo-carrito">
                        Ningún pedido enviado aún
                     </h4>
                     
                     @endif
                  </div>

               </div>
            </div>
         </div>
      </div>
      <!-- History Wrapper End -->

@endsection

<!-- Custom JS -->
@push('customjs')
<script src="{{ asset('js/historial.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush

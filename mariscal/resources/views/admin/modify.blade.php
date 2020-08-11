@extends('layouts.main')

@section('content')

      <!-- Cart Wrapper Start -->
      <div
         id="content"
         class="main-content-wrapper"
         @if ($pedido->cliente)
         data-customer-id="{{ $pedido->cliente->id }}"
         @endif
      >
         <div class="page-content-inner">
            <div class="container">
               <h2 class="mt--40 titulo-carrito">
                  Modificar pedido #
                  {{ $pedido->numero }}
                  ({{ $pedido->cliente->razon_social }})
               </h2>
               
               <div class="row pt--40 pt-sm--25 pb-sm--40">
                  <div class="col-lg-8 offset-lg-2">
                     <div class="cart-collaterals">
                        <div class="cart-totals">
                           <div class="table-content table-responsive">
                              <table class="table order-table">
                                 <tbody>
                                    <tr>
                                       <td class="pb-0 pr-4">
                                          <label for="id_domicilio" class="select-label">
                                             Dirección de entrega
                                          </label>
                                          <select id="id_domicilio" class="form-control select-transporte">
                                             @foreach ($pedido->cliente->domicilios as $domicilio)
                                                <option
                                                   value="{{ $domicilio->id }}"
                                                   {{ $domicilio->id == $pedido->id_domicilio ? 'selected' : '' }}
                                                >
                                                   {{ $domicilio->domicilio }}
                                                </option>
                                             @endforeach
                                          </select>
                                       </td>
                                       <td>
                                          <label for="id_transporte" class="select-label">
                                             Transporte
                                          </label>
                                          <select id="id_transporte" class="form-control select-transporte">
                                             @foreach ($pedido->cliente->transportes as $transporte)
                                                <option
                                                   value="{{ $transporte->id }}"
                                                   {{ $transporte->id == $pedido->id_transporte ? 'selected' : '' }}
                                                >
                                                   {{ $transporte->nombre }}
                                                </option>
                                             @endforeach
                                          </select>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           {{--
                           <a href="#" class="btn btn-fullwidth btn-style-1" id="sendButton">
                              Enviar el pedido
                           </a>
                           <a href="#" class="btn btn-fullwidth btn-style-3 mt-3" id="deleteButton">
                              Eliminar el pedido
                           </a>
                           --}}
                        </div>

                     </div>
                  </div>
               </div>
               
               <div class="row pt--40 pb--80 pt-sm--25 pb-md--60 pb-sm--40">
                  
                  @if($encabezados->count())
                  
                  <div class="col-lg-8 offset-lg-2 mb-md--30">
                     <div class="row">
                        <div class="col-12">
                           <div class="table-content table-responsive">
                              <table class="table text-center">
                                 <tbody>

                                    @foreach ($encabezados as $enc)

                                    <tr data-group-id="{{ $enc->id }}">
                                       <td colspan="4" class="group-name">
                                          <h4>
                                             <a href="{{ url('productos/' . $enc->url) }}">
                                                {{ $enc->nombre }}
                                             </a>
                                          </h4>
                                       </td>
                                       <td class="group-name text-right">
                                          <h4>
                                             <span id="group-total">
                                                {{ $pedido->productos->where('id_niv3', $enc->id)->sum('detalle.cantidad') }}
                                             </span>
                                             {{ App\Envasamiento::where('id_niv3', $enc->id)->where('divisor', 1)->first()->unidad->nombre }}
                                          </h4>
                                       </td>
                                    </tr>

                                    @foreach ($pedido->productos->where('id_niv3', $enc->id) as $prod)
                                    
                                    <tr data-group-id="{{ $enc->id }}">
                                       <td class="product-thumbnail text-left">
                                          <img src="{{ asset($prod->urlImagen) }}" alt="{{ $prod->nombre }}">
                                       </td>

                                       <td class="product-name text-left wide-column">
                                          <h3>
                                             <a href="{{ url('productos/' . $enc->url) }}">
                                                {{ $prod->nombre }}
                                             </a>
                                          </h3>
                                       </td>

                                       <td class="product-quantity">
                                          <div
                                             class="airi-product"
                                             data-product-id="{{ $prod->id }}"
                                          >
                                             <div>
                                                <input
                                                   type="number"
                                                   class="mariscal-input"
                                                   value="{{ $prod->detalle->cantidad }}"
                                                   min="0"
                                                   step="{{ $prod->multiplo }}"
                                                >
                                             </div>
                                          </div>
                                       </td>

                                       <td class="product-quantity">
                                          <div class="airi-product">
                                             <div>
                                                <input
                                                   type="text"
                                                   class="mariscal-input"
                                                   value="{{ $prod->detalle->precio }}"
                                                >
                                             </div>
                                          </div>
                                       </td>

                                       <td class="product-name">
                                          <h3>
                                             {{ $prod->detalle->modificaciones()->count() }} modificaciones
                                          </h3>
                                       </td>
                                    </tr>

                                    @endforeach

                                    @endforeach

                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  @else

                  <div class="col mb-md--30">
                     <h4 class="titulo-carrito">
                        El pedido no tiene productos aún
                     </h4>
                  </div>

                  @endif
               </div>
            </div>
         </div>
      </div>
      <!-- Cart Wrapper End -->

@endsection

<!-- Custom JS -->
@push('customjs')
<script src="{{ asset('js/product.js') }}"></script>
<script src="{{ asset('js/totalizador.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endpush

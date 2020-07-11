@extends('layouts.main')

@section('content')

      {{--
      <!-- Breadcrumb area Start -->
      <div class="bg--white-6">
         <div class="row">
            <div class="col-12 text-center">
               <img src="{{ asset('img/' . $categoria->imagen . '.jpg') }}" alt="{{ $categoria->nombre }}">
            </div>
         </div>
      </div>
      <!-- Breadcrumb area End -->
      --}}

      <!-- Cart Wrapper Start -->
      <div
         id="content"
         class="main-content-wrapper"
         @if ($cliente)
         data-customer-id="{{ $cliente->id }}"
         @endif
      >
         <div class="page-content-inner">
            <div class="container">
               <h2 class="mt--40 titulo-carrito">Pedido para {{ $cliente->razon_social }}</h2>
               
               <div class="row pt--40 pb--80 pt-sm--25 pb-md--60 pb-sm--40">
                  
                  @if($encabezados->count())
                  
                  <div class="col-lg-7 mb-md--30">
                     {{-- <form class="cart-form" action="#"> --}}
                        <div class="row">
                           <div class="col-12">
                              <div class="table-content table-responsive">
                                 <table class="table text-center">
                                    {{--
                                    <thead>
                                       <tr>
                                          <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                          <th class="text-left">Producto</th>
                                          <th>Cantidad</th>
                                       </tr>
                                    </thead>
                                    --}}
                                    <tbody>

                                       @foreach ($encabezados as $enc)

                                       <tr>
                                          <td>
                                             &nbsp;
                                          </td>
                                          <td colspan="2" class="group-name">
                                             <h4>
                                                <a href="{{ url('productos/' . $enc->url) }}">
                                                   {{ $enc->nombre }}
                                                </a>
                                             </h4>
                                          </td>
                                          <td class="group-name text-right">
                                             <h4>
                                                {{ $productos->where('id_niv3', $enc->id)->sum('detalle.cantidad') }}
                                                {{ App\Envasamiento::where('id_niv3', $enc->id)->where('divisor', 1)->first()->unidad->nombre }}
                                             </h4>
                                          </td>
                                       </tr>

                                       @foreach ($productos->where('id_niv3', $enc->id) as $prod)
                                       
                                       <tr>
                                          <td class="product-remove text-left">
                                             <a href="">
                                                <i class="dl-icon-close"></i>
                                             </a>
                                          </td>

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
                                             <div class="quantity">
                                                <input
                                                   type="number"
                                                   class="quantity-input"
                                                   id="quick-qty"
                                                   name="qty"
                                                   value="{{ App\Pedido::inputQuantity($prod) }}"
                                                   min="0"
                                                   step="{{ $prod->multiplo }}"
                                                >
                                             </div>
                                          </div>
                                          </td>
                                       </tr>

                                       @endforeach

                                       @endforeach

                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     {{-- </form> --}}
                  </div>

                  <div class="col-lg-4 offset-lg-1">
                     <div class="cart-collaterals">
                        <div class="cart-totals">
                           <h5 class="mb--15">Totales</h5>
                           <div class="table-content table-responsive">
                              <table class="table order-table">
                                 <tbody>
                                    <tr>
                                       <td>Paquetes</td>
                                       <td id="totalPaquetes">---</td>
                                    </tr>
                                    <tr>
                                       <td>Bultos</td>
                                       <td id="totalBultos">---</td>
                                    </tr>
                                    <tr>
                                       <td colspan="2">
                                          <select id="id_sucursal" class="form-control select-transporte">
                                             <option value="">
                                                (seleccioná la sucursal)
                                             </option>
                                             @foreach ($cliente->sucursales as $sucursal)
                                                <option value="{{ $sucursal->id }}">
                                                   {{ $sucursal->domicilio }}
                                                </option>
                                             @endforeach
                                          </select>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2">
                                          <select id="id_transporte" class="form-control select-transporte">
                                             <option value="">
                                                (seleccioná el transporte)
                                             </option>
                                             @foreach ($cliente->transportes as $transporte)
                                                <option value="{{ $transporte->id }}">
                                                   {{ $transporte->nombre }}
                                                </option>
                                             @endforeach
                                          </select>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td colspan="2">
                                          <textarea id="mensaje" rows="4" placeholder="Mensaje" style="width: 100%; padding: 10px;"></textarea>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <a href="#" class="btn btn-fullwidth btn-style-1" id="sendButton">
                              Enviar el pedido
                           </a>
                           <a href="#" class="btn btn-fullwidth btn-style-3 mt-3" id="deleteButton">
                              Eliminar el pedido
                           </a>
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

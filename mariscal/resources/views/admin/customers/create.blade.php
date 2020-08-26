@extends('layouts.main')

<style>
   .form-control-2 {
      display: block;
      width: 100%;
      // height: calc(2.6rem + 2px);
      padding: .375rem .75rem;
      font-size: 1.5rem;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
   }

   .btn-mariscal {
      padding: 5px 12px;
      border: none;
      border-radius: 50px;
      background-color: #2C3951;
      color: white;
      cursor: pointer;
      transition: 0.2s;
   }

   .btn-mariscal:hover {
      background-color: #cf987e;
   }

   .mariscal-title {
      font-family: 'Roboto Slab';
      font-size: 1.8em;
   }
</style>

@section('content')

      <div id="content" class="main-content-wrapper">
         <div class="page-content-inner">
            <div class="container mt-3">

               @if (session('sucess'))
               <div class="alert alert-success alert-dismissible fade show" role="alert" id="successMessage">
                  Cliente ingresado correctamente!
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               @endif

               <form action="{{ route('admin.customer.addaddress') }}" method="post" id="add_address_form">
                  @csrf
               </form>

               <form action="{{ route('admin.customer.removeaddress') }}" method="post" id="remove_address_form">
                  @csrf
                  @method('delete')
               </form>

               <form action="{{ route('admin.customer.addcarrier') }}" method="post" id="add_carrier_form">
                  @csrf
               </form>

               <form action="{{ route('admin.customer.removecarrier') }}" method="post" id="remove_carrier_form">
                  @csrf
                  @method('delete')
               </form>

               <form action="{{ route('admin.customer.store') }}" method="post" id="store_customer_form">
                  @csrf
               </form>

               <div class="card mx-auto my-4" style="width: 60%;">
                  <div class="card-body">
                     <h4 class="card-title mariscal-title">Ingresar un nuevo cliente</h4>
                     <div class="row mt-4">
                        <div class="col-6">
                           <div class="form-group">
                              <label for="razon_social">
                                 Raz&oacute;n Social
                              </label>
                              <input type="text" class="form-control-2 @error('razon_social') is-invalid @enderror" name="razon_social" id="razon_social" value="{{ old('razon_social') }}" autofocus>
                              @error('razon_social')
                              <p class="text-danger">
                                 {{ $message }}
                              </p>
                              @enderror
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label for="cuit">
                                 CUIT
                              </label>
                              <input type="text" class="form-control-2 @error('cuit') is-invalid @enderror" name="cuit" id="cuit" value="{{ old('cuit') }}">
                              @error('cuit')
                              <p class="text-danger">
                                 {{ $message }}
                              </p>
                              @enderror
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                              <label for="email">
                                 Email
                              </label>
                              <input type="text" class="form-control-2" name="email" id="email">
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label for="responsable">
                                 Responsable
                              </label>
                              <select name="responsable" id="responsable" class="form-control-2">
                                 @foreach ($condiciones as $condicion)
                                 <option value="{{$condicion['id']}}" {{ old('responsable') == $condicion['id'] ? 'selected' : ''}}>
                                    {{ $condicion['nombre'] }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                              <label for="id_vendedor">
                                 Vendedor
                              </label>
                              <select name="id_vendedor" id="id_vendedor" class="form-control-2">
                                 @foreach ($vendedores as $vendedor)
                                 <option value="{{$vendedor->id}}" {{ old('id_vendedor') == $vendedor->id ? 'selected' : ''}}>
                                    {{ $vendedor->razon_social }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label for="id_lista">
                                 Lista de precios
                              </label>
                              <select name="id_lista" id="id_lista" class="form-control-2">
                                 @foreach ($listas as $lista)
                                 <option value="{{$lista->id}}" {{ old('id_lista') == $lista->id ? 'selected' : ''}}>
                                    {{ $lista->nombre }}
                                 </option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-6 pr-2">
                                    <label for="pwd">
                                       Contrase&ntilde;a
                                    </label>
                                    <input type="text" name="pwd" id="pwd" class="form-control-2 @error('pwd') is-invalid @enderror">
                                    @error('pwd')
                                    <p class="text-danger">
                                       {{ $message }}
                                    </p>
                                    @enderror
                                 </div>
                                 <div class="col-6 pl-2">
                                    <label for="marca">
                                       Marca
                                    </label>
                                    <input type="text" name="marca" id="marca" class="form-control-2" value="{{ old('marca') }}">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <div class="row">
                                 <div class="col-6 pr-2">
                                    <label for="codigo_erp">
                                       C&oacute;digo ERP
                                    </label>
                                    <input type="text" name="codigo_erp" id="codigo_erp" class="form-control-2" value="{{ old('codigo_erp') }}">
                                 </div>
                                 <div class="col-6 pl-2">
                                    <label>&nbsp;</label>
                                    <br>
                                    <input type="submit" value="Crear Cliente" class="btn-mariscal" form="store_customer_form">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <hr>
                     <div class="row">
                        <div class="col-6">
                           <div class="form-group">
                              <label for="domicilios">
                                 Domicilios
                              </label>
                              <select name="dom_list" id="domicilios" class="form-control-2" size="6" form="remove_address_form">
                                 @foreach ($dom_list as $domicilio)
                                 <option value="{{ $domicilio->id }}">
                                    {{
                                    $domicilio->domicilio
                                    . ' - '
                                    . $domicilio->localidad
                                    . $domicilio->es_central ? ' (central)' : ''
                                    }}
                                 </option>
                                 @endforeach
                              </select>
                              @error('dom_list')
                              <p class="text-danger">
                                 {{ $message }}
                              </p>
                              @enderror
                              <div class="card mt-1">
                                 <div class="card-body">
                                    <div class="form-group">
                                       <label for="dom_dir">
                                          Direcci&oacute;n
                                       </label>
                                       <input type="text" class="form-control-2 @error('dom_dir') is-invalid @enderror" id="dom_dir" name="dom_dir" value="{{ old('dom_dir') }}" form="add_address_form">
                                       @error('dom_dir')
                                       <p class="text-danger">
                                          {{ $message }}
                                       </p>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                       <label for="dom_loc">
                                          Localidad
                                       </label>
                                       <input type="text" class="form-control-2 @error('dom_loc') is-invalid @enderror" id="dom_loc" name="dom_loc" value="{{ old('dom_loc') }}" form="add_address_form">
                                       @error('dom_loc')
                                       <p class="text-danger">
                                          {{ $message }}
                                       </p>
                                       @enderror
                                    </div>
                                    <div class="form-group">
                                       <div class="row">
                                          <div class="col-6 pr-2">
                                             <label for="dom_cp">
                                                C&oacute;digo Postal
                                             </label>
                                             <input type="text" class="form-control-2" id="dom_cp" name="dom_cp" value="{{ old('dom_cp') }}" form="add_address_form">
                                          </div>
                                          <div class="col-6 pl-2">
                                             <label for="dom_tel">
                                                Tel&eacute;lefono
                                             </label>
                                             <input type="text" class="form-control-2" id="dom_tel" name="dom_tel" value="{{ old('dom_tel') }}" form="add_address_form">
                                          </div>
                                       </div>
                                    </div>

                                    <input type="checkbox" style="transform: scale(1.2); margin-right: 4px;" id="dom_cent" name="dom_cent" {{ old('dom_cent') ? 'checked' : '' }} form="add_address_form">
                                    <label for="dom_cent">
                                       Es central
                                    </label>
                                    <br>

                                    <input type="submit" value="Agregar Domicilio" class="btn-mariscal" form="add_address_form">

                                 </div>
                              </div>
                              <input type="submit" value="Quitar Seleccionado" class="btn-mariscal mt-2" form="remove_address_form">
                           </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                              <label for="transportes">
                                 Transportes
                              </label>
                              <select name="trans_list" id="transportes" size="6" class="form-control-2" form="remove_carrier_form">
                                 @foreach ($trans_list as $transporte)
                                 <option value="{{ $transporte->id }}">
                                    {{ $transporte->nombre }}
                                 </option>
                                 @endforeach
                              </select>
                              @error('transportes')
                              <p class="text-danger">
                                 {{ $message }}
                              </p>
                              @enderror
                              <select name="id_transporte" id="id_transporte" class="form-control-2 mt-1" form="add_carrier_form">
                                 @foreach ($transportes as $transporte)
                                 <option value="{{ $transporte->id }}" {{ old('id_transporte') == $transporte->id ? 'selected' : '' }}>
                                    {{ $transporte->nombre }}
                                 </option>
                                 @endforeach
                              </select>
                              <input type="submit" value="Quitar Seleccionado" class="btn-mariscal mt-2" form="remove_carrier_form">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

@endsection
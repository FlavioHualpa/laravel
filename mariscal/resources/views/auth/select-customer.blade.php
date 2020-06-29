@extends('layouts.main')

@section('content')

      <!-- Main Content Wrapper Start -->
      <div id="content" class="main-content-wrapper">
         <div class="page-content-inner">
            <div class="container">
               <div class="row pt--75 pt-md--55 pt-sm--35 pb--80 pb-md--60 pb-sm--40">
                  <div class="col-md-6 offset-md-3 mb-sm--30">
                     <div class="login-box">
                        <h4 class="mb--35 mb-sm--20">
                           Hola {{ auth()->user()->razon_social }},
                           <br>
                           por favor seleccioná un cliente
                        </h4>
                        <form class="form form--login" method="post" action="{{ route('set.customer') }}">

                           @csrf

                           <div class="form__group mb--20">
                              <label class="form__label form__label--2" for="id_cliente">
                                 Cliente
                                 <span class="required">*</span>
                              </label>
                              <select
                                 type="text"
                                 class="form__input form__input--3 @error('id_cliente') is-invalid @enderror"
                                 id="id_cliente"
                                 name="id_cliente"
                                 required
                              >
                                 @foreach ($clientes as $cliente)
                                     <option
                                         value="{{ $cliente->id }}"
                                         {{ old('id_cliente') == $cliente->id ? 'selected' : '' }}
                                     >
                                         {{ $cliente->razon_social }}
                                     </option>
                                 @endforeach
                              </select>
                              @error('id_cliente')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror                              
                           </div>

                           <div class="d-flex align-items-center mb--20">
                              <div class="form__group">
                                 <input
                                    type="submit"
                                    value="Seleccionar"
                                    class="btn btn-submit btn-style-1"
                                 >
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Main Content Wrapper Start -->

@endsection

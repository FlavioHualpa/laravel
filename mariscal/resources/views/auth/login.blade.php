@extends('layouts.main')

@section('content')

      <!-- Main Content Wrapper Start -->
      <div id="content" class="main-content-wrapper">
         <div class="page-content-inner">
            <div class="container">
               <div class="row pt--75 pt-md--55 pt-sm--35 pb--80 pb-md--60 pb-sm--40">
                  <div class="col-md-6 offset-md-3 mb-sm--30">
                     <div class="login-box">
                        <h4 class="mb--35 mb-sm--20">Ingresar como usuario</h4>
                        <form class="form form--login" method="post" action="{{ route('login') }}">

                           @csrf

                           <div class="form__group mb--20">
                              <label class="form__label form__label--2" for="cuit">
                                 CUIT
                                 <span class="required">*</span>
                              </label>
                              <input
                                 type="text"
                                 class="form__input form__input--3 @error('cuit') is-invalid @enderror"
                                 id="cuit"
                                 name="cuit"
                                 value="{{ old('cuit') }}"
                                 required
                                 autofocus
                              >
                              @error('cuit')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror                              
                           </div>

                           <div class="form__group mb--20">
                              <label class="form__label form__label--2" for="password">
                                 Contraseña
                                 <span class="required">*</span>
                              </label>
                              <input
                                 type="password"
                                 class="form__input form__input--3 @error('password') is-invalid @enderror"
                                 id="password"
                                 name="password"
                                 required
                              >
                              @error('password')
                              <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                              </span>
                              @enderror                              
                           </div>

                           <div class="d-flex align-items-center mb--20">
                              <div class="form__group">
                                 <input
                                    type="submit"
                                    value="Ingresar"
                                    class="btn btn-submit btn-style-1"
                                 >
                              </div>
                              <div class="form__group">
                                 <label class="form__label checkbox-label" for="remember">
                                    <input
                                       type="checkbox"
                                       id="remember"
                                       name="remember"
                                       style="transform: scale(1.5);"
                                       {{ old('remember') ? 'checked' : '' }}
                                    >
                                    <span>Recordarme</span>
                                 </label>
                              </div>
                           </div>

                           @if (Route::has('password.request'))
                           <a class="forgot-pass" href="{{ route('password.request') }}">
                              Olvidaste tu contraseña?
                           </a>
                           @endif
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Main Content Wrapper Start -->

@endsection

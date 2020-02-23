@extends('layouts.fnapp')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
@endpush

@section('content')
<div class="login-box">

   <div class="login-header">
      <div>FactuNet</div>
      <div>Ingreso de usuarios</div>
   </div>

   <form method="POST" action="{{ route('login') }}">
      @csrf
      
      <div class="form-group">
         <label for="email" class="form-control form-control-label">{{ __('login.email') }}</label>
         
         <div class="col-md-6">
            <input id="email" type="email" class="form-control form-control-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
            @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
      </div>
      
      <div class="form-group">
         <label for="password" class="form-control form-control-label">{{ __('login.password') }}</label>
         
         <div class="col-md-6">
            <input id="password" type="password" class="form-control form-control-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
            @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
      </div>
      
      <div class="form-group mt-1">
         <div class="col-md-6 offset-md-4">
            <div class="form-check">
               <input class="form-control-check" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="transform: scale(1.3)">
               
               <label class="form-control-label" for="remember">
                  {{ __('login.remember') }}
               </label>
            </div>
         </div>
      </div>
      
      <div class="form-group mt-2">
         <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
               {{ __('login.login') }}
            </button>
            
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
               {{ __('login.forgot') }}
            </a>
            @endif
         </div>
      </div>

      {{-- <div class="form-group mt-3">
         <i class="fas fa-question"></i>
         <p class="login-footer-caption">
            No estás registrado como usuario?<br>Utiliza <a href="{{ route('register') }}">este formulario</a> para registrarte.
         </p>
      </div> --}}
   </form>
</div>
@endsection
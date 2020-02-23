@extends('layouts.fnapp')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
@endpush

@section('content')
<div class="login-box">

   <div class="login-header">
      <div>FactuNet</div>
      <div>Registro de usuarios</div>
   </div>

   <form method="POST" action="{{ route('register') }}">
      @csrf
      
      <div class="form-group">
         <label for="name" class="form-control form-control-label">{{ __('login.name') }}</label>
         
         <div class="col-md-6">
            <input id="name" type="text" class="form-control form-control-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            
            @error('name')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
            @enderror
         </div>
      </div>
      
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
      
      <div class="form-group">
         <label for="password-confirm" class="form-control form-control-label">{{ __('login.confirm') }}</label>
         
         <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control form-control-input" name="password_confirmation" required autocomplete="new-password">
         </div>
      </div>

      <div class="form-group mt-2">
         <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
               {{ __('login.register') }}
            </button>
         </div>
      </div>
   </form>
</div>
@endsection
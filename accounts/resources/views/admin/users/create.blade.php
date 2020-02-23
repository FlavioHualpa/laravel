@extends('layouts.fnapp')

@push('styles')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
@endpush

@section('navbar')
@include('partials.navbar')
@endsection

@section('content')

<div class="mb-4">
   <span class="bread-crumb">
      <a href="{{ route('admin.home') }}">
         <h4>Administración de cuenta</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <a href="{{ route('admin.users.search') }}">
         <h4>Usuarios</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Ingresar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Nuevo Usuario</h3>
   </div>

   <form action="{{ route('admin.users.store') }}" method="post">

      @csrf

      <div class="form-row">
         <div class="col-6">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-6">
            <label for="email" class="mb-1">E-mail</label>
            <input type="email" class="form-control form-control-lg font-weight-bold @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-4">
         <div class="col-6">
            <label for="password" class="mb-1">Contraseña</label>
            <input type="password" class="form-control form-control-lg font-weight-bold @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-6">
            <label for="password_confirmation" class="mb-1">Confirme la contraseña</label>
            <input type="password" class="form-control form-control-lg font-weight-bold @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto account_id necesario para crear el usuario --}}
      <input type="hidden" name="account_id"
         value="{{ auth('admin')->id() }}">

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
            <a href="{{ route('admin.users.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

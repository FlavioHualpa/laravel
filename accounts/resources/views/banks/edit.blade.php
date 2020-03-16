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
      <a href="{{ route('home') }}">
         <h4>Inicio</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <a href="{{ route('banks.home') }}">
         <h4>Bancos</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Modificar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Modificar Banco</h3>
   </div>

   <form action="{{ route('banks.update', $bank->id) }}" method="post">

      @csrf
      @method('patch')

      <div class="form-row">
         <div class="col-4">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $bank->code) }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-8">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $bank->name) }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto account_id necesario para actualizar el banco --}}
      <input type="hidden" name="account_id"
         value="{{ auth()->user()->account->id }}">

      <div class="form-row mt-4">
         <div class="col">
            <button type="submit" class="btn btn-primary">Modificar Banco</button>
            <a href="{{ route('banks.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

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
      <a href="{{ route('admin.states.search') }}">
         <h4>Provincias</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Modificar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Modificar Provincia</h3>
   </div>

   <form action="{{ route('admin.states.update', $state->id) }}" method="post">

      @csrf
      @method('patch')

      <div class="form-row">
         <div class="col-3">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $state->code) }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-6">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $state->name) }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto account_id necesario para modificar la provincia --}}
      <input type="hidden" name="account_id"
         value="{{ auth('admin')->id() }}">

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary">Modificar Provincia</button>
            <a href="{{ route('admin.states.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

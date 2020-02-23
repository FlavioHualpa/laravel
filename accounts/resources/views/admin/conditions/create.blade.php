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
      <a href="{{ route('admin.conditions.search') }}">
         <h4>Condiciones Impositivas</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Ingresar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Nueva Condición Impositiva</h3>
   </div>

   <form action="{{ route('admin.conditions.store') }}" method="post">

      @csrf

      <div class="form-row">
         <div class="col-3">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-6">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="tax" class="mb-1">IVA %</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('tax') is-invalid @enderror" id="tax" name="tax" value="{{ old('tax', 0) }}">
            @error('tax')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto account_id necesario para crear la condición --}}
      <input type="hidden" name="account_id"
         value="{{ auth('admin')->id() }}">

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary">Crear Condición</button>
            <a href="{{ route('admin.conditions.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

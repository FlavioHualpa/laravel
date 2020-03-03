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
      <h4>Modificar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Modificar Condición Impositiva</h3>
   </div>

   <form action="{{ route('admin.conditions.update', $condition->id) }}" method="post">

      @csrf
      @method('patch')

      <div class="form-row">
         <div class="col-2">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $condition->code) }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-6">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $condition->name) }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="tax_1" class="mb-1">IVA % Producto</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('product_tax') is-invalid @enderror" id="tax_1" name="product_tax" value="{{ old('product_tax', $condition->product_tax * 100) }}">
            @error('product_tax')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="tax_2" class="mb-1">IVA % Final</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('final_tax') is-invalid @enderror" id="tax_2" name="final_tax" value="{{ old('final_tax', $condition->final_tax * 100) }}">
            @error('final_tax')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto company_id necesario para crear el usuario --}}
      <input type="hidden" name="account_id"
         value="{{ auth('admin')->id() }}">

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary">Modificar Condición</button>
            <a href="{{ route('admin.conditions.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

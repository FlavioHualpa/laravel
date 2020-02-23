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
      <a href="{{ route('products.home') }}">
         <h4>Artículos</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Ingresar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Nuevo Artículo</h3>
   </div>

   <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

      @csrf

      <div class="form-row">
         <div class="col-4">
            <input type="text" class="form-control @error('code') is-invalid @enderror" placeholder="Código" name="code" value="{{ old('code') }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-8">
            <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Descripción" name="description" value="{{ old('description') }}">
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-4">
         <div class="col">
            <div class="custom-file">
               <input type="file" class="custom-file-input" id="customFileLang" lang="es" name="product_image" accept=".jpg,.jpeg,.png,.bmp">
               <label class="custom-file-label" for="customFileLang">Seleccionar Imagen</label>
            </div>
            @error('product_image')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto company_id necesario para crear el producto --}}
      <input type="hidden" name="company_id"
         value="{{ session()->get('active_company')->id }}">

      <div class="form-row mt-4">
         <div class="col">
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="{{ App\Product::STATUS_ACTIVE }}" {{ old('status', 0) == App\Product::STATUS_ACTIVE ? 'checked' : '' }}>
               <label class="form-check-label" for="inlineRadio1">Activo</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="{{ App\Product::STATUS_SUSPENDED }}" {{ old('status', 0) == App\Product::STATUS_SUSPENDED ? 'checked' : '' }}>
               <label class="form-check-label" for="inlineRadio2">Suspendido</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="{{ App\Product::STATUS_DISCONTINUED }}" {{ old('status', 0) == App\Product::STATUS_DISCONTINUED ? 'checked' : '' }}>
               <label class="form-check-label" for="inlineRadio3">Discontinuado</label>
            </div>
            @error('status')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-4">
         <div class="col">
            <button type="submit" class="btn btn-primary">Crear Artículo</button>
            <a href="{{ route('products.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

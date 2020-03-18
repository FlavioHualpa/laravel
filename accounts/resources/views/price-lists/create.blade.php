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
      <a href="{{ route('price-lists.home') }}">
         <h4>Listas de precios</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Ingresar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Nueva Lista de precios</h3>
   </div>

   <form action="{{ route('price-lists.store') }}" method="post">

      @csrf

      <div class="form-row">
         <div class="col-4">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}" autofocus>
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-8">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="row">
         <div class="col">
            <h4 class="mt-4">Productos</h4>
         </div>
      </div>

      <div class="form-row">

         @foreach ($products as $product)
            <div class="col-3">
               <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold" value="{{ $product->code }}">
            </div>
            <div class="col-6">
               <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold" value="{{ $product->description }}">
            </div>
            <div class="col-3">
               <input type="text" class="form-control form-control-lg font-weight-bold text-right @error('products.{{$loop->iteration}}.price') is-invalid @enderror" name="products[{{$loop->iteration}}][price]" value="{{ old('products.' . $loop->iteration . '.price', '0.00') }}">
               @error('products.{{$loop->iteration}}.price')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
            <input type="hidden" name="products[{{$loop->iteration}}][product_id]" value="{{ $product->id }}">
         @endforeach

      </div>

      {{-- el campo oculto company_id necesario para crear la lista --}}
      <input type="hidden" name="company_id"
         value="{{ session('active_company')->id }}">

      <div class="form-row mt-4">
         <div class="col">
            <button type="submit" class="btn btn-primary">Crear Lista</button>
            <a href="{{ route('price-lists.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

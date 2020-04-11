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
      <a href="{{ route('products.reports.index') }}">
         <h4>Listados de artículos</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Parámetros</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>{{ $parameters['title'] }}</h3>
   </div>

   <form action="{{ $parameters['route'] }}" method="post">

      @csrf

      <div class="form-row">

         <div class="col-6">
            <label for="from_product" class="mb-1">Desde Artículo</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('from_product_id') is-invalid @enderror" id="from_product" name="from_product_id" autofocus>
               @foreach ($products as $product)
                  <option value="{{ $product->id }}" {{ old('from_product_id', Cookie::get('user_' . auth()->user()->id . '_from_product_id')) == $product->id ? 'selected' : '' }}>
                     {{ $product->code . ' - ' . $product->description }}
                  </option>
               @endforeach
            </select>
            @error('from_product_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @if ($parameters['show_to_product'])

         <div class="col-6">
            <label for="to_product" class="mb-1">Hasta Artículo</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('to_product_id') is-invalid @enderror" id="to_product" name="to_product_id">
               @foreach ($products as $product)
                  <option value="{{ $product->id }}" {{ old('to_product_id', Cookie::get('user_' . auth()->user()->id . '_to_product_id')) == $product->id ? 'selected' : '' }}>
                     {{ $product->code . ' - ' . $product->description }}
                  </option>
               @endforeach
            </select>
            @error('to_product_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @endif

      </div>

      <div class="form-row mt-3">

         @if ($parameters['show_from_date'])

         <div class="col-3">
            <label for="from_date" class="mb-1">Desde Fecha</label>
            <input type="date" class="form-control form-control-lg font-weight-bold @error('from_date') is-invalid @enderror" id="from_date" name="from_date" value="{{ old('from_date', Cookie::get('user_' . auth()->user()->id . '_from_date') ?? now()->format('Y-m-d')) }}">
            @error('from_date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @endif

         @if ($parameters['show_to_date'])

         <div class="col-3">
            <label for="to_date" class="mb-1">Hasta Fecha</label>
            <input type="date" class="form-control form-control-lg font-weight-bold @error('to_date') is-invalid @enderror" id="to_date" name="to_date" value="{{ old('to_date', Cookie::get('user_' . auth()->user()->id . '_to_date') ?? now()->format('Y-m-d')) }}">
            @error('to_date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @endif
      
      </div>

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary" id="showBtn">
               Ver listado
            </button>
            <a href="{{ route('products.reports.index') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>

   </form>

</div>
@endsection

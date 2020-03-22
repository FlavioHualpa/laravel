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
      <h4>Buscar</h4>
   </span>
</div>

<div class="form-box mb-4">
   <form class="form-inline" action="{{ route('products.search') }}" style="margin: 15px;">
      <input type="text" class="form-control mr-4" name="q" placeholder="Buscar" value="{{ request()->query('q') }}">
      
      <div class="form-check mr-2">
         <label class="form-check-label mr-3">
            Mostrar Artículos
         </label>
         
         <input class="form-check-input" type="checkbox" id="suspended" name="show[]" value="sus" style="transform: scale(1.3);" {{ array_search('sus', request()->query('show') ?? []) !== FALSE ? 'checked' : '' }}>
         <label class="form-check-label mr-3" for="suspended">
            Suspendidos
         </label>

         <input class="form-check-input" type="checkbox" id="discontinued" name="show[]" value="dis" style="transform: scale(1.3);" {{ array_search('dis', request()->query('show') ?? []) !== FALSE ? 'checked' : '' }}>
         <label class="form-check-label mr-3" for="discontinued">
            Discontinuados
         </label>
      </div>
      
      <button type="submit" class="btn btn-primary">Buscar</button>
   </form>
</div>

<table class="table table-striped table-dark">
   <thead>
      <tr>
         <th scope="col">
            <a href="{{ route('products.search') . App\OrderQuery::make('code') }}">
               Código
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('products.search') . App\OrderQuery::make('description') }}">
               Descripción
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('products.search') . App\OrderQuery::make('created_at') }}">
               Creado el
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('products.search') . App\OrderQuery::make('status') }}">
               Estado
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($products as $product)
      <tr>
         <td>
            <a href="{{ route('products.edit', $product->id) }}" class="{{ $product->css_class }}">
               {{ $product->code }}
            </a>
         </td>
         <td>{{ $product->description }}</td>
         <td>{{ $product->created_at->format('d-m-Y 🕒 H:i') }}</td>
         <td>{{ $product->status_name }}</td>
      </tr>
      @empty
      <tr>
         <td colspan="4">No hay artículos</td>
      </tr>
      @endforelse
   </tbody>
</table>

<a href="{{ route('products.create') }}" class="btn btn-primary">
   Ingresar un artículo
</a>
<a href="{{ route('products.home') }}" class="btn btn-dark ml-2">
   Volver
</a>
@endsection

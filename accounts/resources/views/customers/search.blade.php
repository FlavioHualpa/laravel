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
      <a href="{{ route('customers.home') }}">
         <h4>Clientes</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Buscar</h4>
   </span>
</div>

<div class="form-box mb-4">
   <form class="form-inline" action="{{ route('customers.search') }}" style="margin: 15px;">
      <input type="text" class="form-control mr-4" name="q" placeholder="Buscar" value="{{ request()->query('q') }}">
      
      <div class="form-check mr-2">
         <label class="form-check-label mr-3">
            Mostrar Clientes
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
            <a href="{{ route('customers.search') . App\OrderQuery::make('code') }}">
               Código
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('customers.search') . App\OrderQuery::make('name') }}">
               Nombre
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('customers.search') . App\OrderQuery::make('street') }}">
               Domicilio
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('customers.search') . App\OrderQuery::make('fiscal_id') }}">
               CUIT
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('customers.search') . App\OrderQuery::make('status') }}">
               Estado
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($customers as $customer)
      <tr>
         <td>
            <a href="{{ route('customers.edit', $customer->id) }}" class="{{ $customer->css_class }}">
               {{ $customer->code }}
            </a>
         </td>
         <td>{{ $customer->name }}</td>
         <td>{{ $customer->full_address }}</td>
         <td>{{ $customer->fiscal_id }}</td>
         <td>{{ $customer->status_name }}</td>
      </tr>
      @empty
      <tr>
         <td colspan="5">No hay clientes</td>
      </tr>
      @endforelse
   </tbody>
</table>

<a href="{{ route('customers.create') }}" class="btn btn-primary">
   Ingresar un cliente
</a>
<a href="{{ route('customers.home') }}" class="btn btn-dark ml-2">
   Volver
</a>
@endsection

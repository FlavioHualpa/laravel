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
      <h4>Buscar</h4>
   </span>
</div>

<div class="form-box mb-4">
   <form class="form-inline" action="{{ route('banks.search') }}" style="margin: 15px;">
      <input type="text" class="form-control mr-4" name="q" placeholder="Buscar" value="{{ request()->query('q') }}">
      
      <div class="form-check mr-2">
         <label class="form-check-label mr-3">
            Mostrar Bancos
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
            <a href="{{ route('banks.search') . App\OrderQuery::make('code') }}">
               Código
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('banks.search') . App\OrderQuery::make('name') }}">
               Nombre
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('banks.search') . App\OrderQuery::make('created_at') }}">
               Creado el
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($banks as $bank)
      <tr>
         <td>
            <a href="{{ route('banks.edit', $bank->id) }}">
               {{ $bank->code }}
            </a>
         </td>
         <td>{{ $bank->name }}</td>
         <td>{{ $bank->created_at->format('d-m-Y 🕒 H:i') }}</td>
      </tr>
      @empty
      <tr>
         <td colspan="3">No hay bancos</td>
      </tr>
      @endforelse
   </tbody>
</table>

<a href="{{ route('banks.create') }}" class="btn btn-primary">
   Ingresar un banco
</a>
<a href="{{ route('banks.home') }}" class="btn btn-dark ml-2">
   Volver
</a>
@endsection

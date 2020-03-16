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
      <a href="{{ route('bank-accounts.home') }}">
         <h4>Cuentas Bancarias</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Buscar</h4>
   </span>
</div>

<div class="form-box mb-4">
   <form class="form-inline" action="{{ route('bank-accounts.search') }}" style="margin: 15px;">
      <input type="text" class="form-control mr-4" name="q" placeholder="Buscar" value="{{ request()->query('q') }}">
      
      <div class="form-check mr-2">
         <label class="form-check-label mr-3">
            Mostrar Cuentas Bancarias
         </label>
         
         <input class="form-check-input" type="checkbox" id="suspended" name="show[]" value="sus" style="transform: scale(1.3);" {{ array_search('sus', request()->query('show') ?? []) !== FALSE ? 'checked' : '' }}>
         <label class="form-check-label mr-3" for="suspended">
            Suspendidas
         </label>

         <input class="form-check-input" type="checkbox" id="discontinued" name="show[]" value="dis" style="transform: scale(1.3);" {{ array_search('dis', request()->query('show') ?? []) !== FALSE ? 'checked' : '' }}>
         <label class="form-check-label mr-3" for="discontinued">
            Discontinuadas
         </label>
      </div>
      
      <button type="submit" class="btn btn-primary">Buscar</button>
   </form>
</div>

<table class="table table-striped table-dark">
   <thead>
      <tr>
         <th scope="col">
            <a href="{{ route('bank-accounts.search') . App\OrderQuery::make('code') }}">
               Código
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('bank-accounts.search') . App\OrderQuery::make('name') }}">
               Nombre
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('bank-accounts.search') . App\OrderQuery::make('number') }}">
               Número
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('bank-accounts.search') . App\OrderQuery::make('bank_id') }}">
               Banco
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('bank-accounts.search') . App\OrderQuery::make('created_at') }}">
               Creada el
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($bank_accounts as $acc)
      <tr>
         <td>
            <a href="{{ route('bank-accounts.edit', $acc->id) }}">
               {{ $acc->code }}
            </a>
         </td>
         <td>{{ $acc->name }}</td>
         <td>{{ $acc->number }}</td>
         <td>{{ $acc->bank->name }}</td>
         <td>{{ $acc->created_at->format('d-m-Y 🕒 H:i') }}</td>
      </tr>
      @empty
      <tr>
         <td colspan="5">No hay cuentas bancarias</td>
      </tr>
      @endforelse
   </tbody>
</table>

<a href="{{ route('bank-accounts.create') }}" class="btn btn-primary">
   Ingresar una cuenta bancaria
</a>
<a href="{{ route('bank-accounts.home') }}" class="btn btn-dark ml-2">
   Volver
</a>
@endsection

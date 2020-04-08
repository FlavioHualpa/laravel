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
         <h4>Listados de clientes</h4>
      </span>
   </div>

   <div class="row">
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('customers.reports.parameters', 0) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Operaciones" class="tile-image">
               <h3>Operaciones</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('customers.reports.parameters', 1) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Cuenta Corriente" class="tile-image">
               <h3>Cuenta Corriente</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('customers.reports.parameters', 2) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Saldos" class="tile-image">
               <h3>Saldos</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('customers.reports.parameters', 3) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Ficha del Cliente" class="tile-image">
               <h3>Ficha del Cliente</h3>
            </article>
         </a>
      </div>
   </div>
@endsection

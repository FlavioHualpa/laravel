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
         <h4>Inicio</h4>
      </span>
   </div>

   <div class="row">
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('products.home') }}">
            <article class="section-tile">
               <img src="{{ asset('img/products-tile.png') }}" alt="Artículos" class="tile-image">
               <h3>Artículos</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('customers.home') }}">
            <article class="section-tile">
               <img src="{{ asset('img/customers-tile.png') }}" alt="Clientes" class="tile-image">
               <h3>Clientes</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('invoices.create') }}">
            <article class="section-tile">
               <img src="{{ asset('img/invoices-tile.png') }}" alt="Facturación" class="tile-image">
               <h3>Facturación</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('payments.create') }}">
            <article class="section-tile">
               <img src="{{ asset('img/payments-tile.png') }}" alt="Pagos" class="tile-image">
               <h3>Pagos</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('payments.create') }}">
            <article class="section-tile">
               <img src="{{ asset('img/applications-tile.png') }}" alt="Imputaciones" class="tile-image">
               <h3>Imputaciones</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('banks.home') }}">
            <article class="section-tile">
               <img src="{{ asset('img/banks-tile.png') }}" alt="Bancos" class="tile-image">
               <h3>Bancos</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('bank-accounts.home') }}">
            <article class="section-tile">
               <img src="{{ asset('img/bank-accounts-tile.png') }}" alt="Cuentas Bancarias" class="tile-image">
               <h3>Cuentas Bancarias</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('price-lists.home') }}">
            <article class="section-tile">
               <img src="{{ asset('img/price-lists-tile.png') }}" alt="Listas de Precios" class="tile-image">
               <h3>Listas de Precios</h3>
            </article>
         </a>
      </div>
   </div>
@endsection

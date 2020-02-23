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
               <img src="{{ asset('img/products-tile.png') }}" alt="Productos" class="tile-image">
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
   </div>
@endsection

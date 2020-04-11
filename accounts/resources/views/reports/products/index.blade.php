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
         <h4>Listados de artículos</h4>
      </span>
   </div>

   <div class="row">
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('products.reports.parameters', 0) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Estadística de ventas" class="tile-image">
               <h3>Estadística de ventas</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('products.reports.parameters', 1) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Comprobantes por artículo" class="tile-image">
               <h3>Comprobantes por artículo</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('products.reports.parameters', 2) }}">
            <article class="section-tile">
               <img src="{{ asset('img/reports-tile.png') }}" alt="Ficha del artículo" class="tile-image">
               <h3>Ficha del artículo</h3>
            </article>
         </a>
      </div>
   </div>
@endsection

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
         <h4>Listas de precios</h4>
      </span>
   </div>

   <div class="row">
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('price-lists.search') }}">
            <article class="section-tile">
               <img src="{{ asset('img/search-tile.png') }}" alt="Buscar Bancos" class="tile-image">
               <h3>Buscar</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('price-lists.create') }}">
            <article class="section-tile">
               <img src="{{ asset('img/create-tile.png') }}" alt="Ingresar un Banco" class="tile-image">
               <h3>Ingresar</h3>
            </article>
         </a>
      </div>
   </div>
@endsection

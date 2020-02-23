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
         <h4>Adminstración de cuenta</h4>
      </span>
   </div>

   <div class="row">
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('admin.companies.search') }}">
            <article class="section-tile">
               <img src="{{ asset('img/companies-tile.png') }}" alt="Productos" class="tile-image">
               <h3>Empresas</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('admin.users.search') }}">
            <article class="section-tile">
               <img src="{{ asset('img/customers-tile.png') }}" alt="Clientes" class="tile-image">
               <h3>Usuarios</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('admin.conditions.search') }}">
            <article class="section-tile">
               <img src="{{ asset('img/fiscal-tile.png') }}" alt="Condiciones" class="tile-image">
               <h3>Condición Impositiva</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('admin.states.search') }}">
            <article class="section-tile">
               <img src="{{ asset('img/states-tile.png') }}" alt="Provincias" class="tile-image">
               <h3>Provincias</h3>
            </article>
         </a>
      </div>
      <div class="col-md-6 col-lg-4 mt-4">
         <a href="{{ route('admin.transports.search') }}">
            <article class="section-tile">
               <img src="{{ asset('img/transportations-tile.png') }}" alt="Transportes" class="tile-image">
               <h3>Transportes</h3>
            </article>
         </a>
      </div>
   </div>
@endsection

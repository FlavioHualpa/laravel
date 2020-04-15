@extends('layouts.fnapp')

@push('styles')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<link href="{{ asset('css/report.css') }}" rel="stylesheet">
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
      <a href="{{ route('products.reports.index') }}">
         <h4>Listados de artículos</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Comprobantes por artículo</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Comprobantes por artículo</h3>
   </div>

   <div class="form-box-body">
      <h2>
         {{ $product->description }}&nbsp;&nbsp;&nbsp;[{{ $product->code }}]
      </h2>
      <h5>
         Desde {{ LocalFormat::date($from_date) }}
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         Hasta {{ LocalFormat::date($to_date) }}
      </h5>
      <h5 class="mt-3">
         Fecha del listado: {{ LocalFormat::date(now()) }}
      </h5>

      <div class="row mt-4">
         <div class="col-2">
            <span class="report-title-col">
               Fecha
            </span>
         </div>
         <div class="col-3">
            <span class="report-title-col">
               Comprobante
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-title-col">
               Número
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-title-col">
               Cantidad
            </span>
         </div>
         <div class="col-3">
            <span class="report-title-col">
               Cliente
            </span>
         </div>
      </div>

      @foreach ($sales as $sale)
      <div class="row highlight">
         <div class="col-2">
            <span class="report-data-col">
               {{ LocalFormat::date($sale['date']) }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-col">
               {{ $sale['name'] }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ $sale['number'] }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ LocalFormat::float($sale['sold']) }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-col">
               {{ $sale['customer'] }}
            </span>
         </div>
      </div>
      @endforeach

      <div class="row mt-2">
         <div class="col-2">
         </div>
         <div class="col-3">
         </div>
         <div class="col-2 text-right">
            <span class="report-total-col">
               Total Vendido:
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-total-col">
               {{ LocalFormat::float($total) }}
            </span>
         </div>
      </div>

      <div class="row mt-4">
         <div class="col-3">
            <a href="{{ route('products.reports.parameters', 1) }}" class="btn btn-primary">
               Otra Consulta
            </a>
         </div>
      </div>
   </div>
</div>

@endsection

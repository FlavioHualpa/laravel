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
      <a href="{{ route('customers.home') }}">
         <h4>Clientes</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <a href="{{ route('customers.reports.index') }}">
         <h4>Listados de clientes</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Ficha del cliente</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Ficha del cliente</h3>
   </div>

   <div class="form-box-body">
      <h2>
         Desde: {{ $from_customer->name }}&nbsp;&nbsp;&nbsp;[{{ $from_customer->code }}]
      </h2>
      <h2>
         Hasta: {{ $to_customer->name }}&nbsp;&nbsp;&nbsp;[{{ $to_customer->code }}]
      </h2>
      <h5 class="mt-3 mb-5">
         Fecha del listado: {{ LocalFormat::date(now()) }}
      </h5>

      @foreach ($customers as $customer)

      <div class="row highlight">
         <div class="col-2">
            <span class="report-data-header-col">
               {{ $customer->code }}
            </span>
         </div>
         <div class="col-4">
            <span class="report-data-header-col">
               {{ $customer->name }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-header-col">
               {{ $customer->condition->name }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-header-col">
               {{ $customer->fiscal_id }}
            </span>
         </div>
      </div>

      <div class="row">
         <div class="col">
            <span class="report-data-col">
               {{ $customer->fullAddress }} - ({{ $customer->address['zip'] }}) {{ $states->find($customer->address['state_id'])->name }}
            </span>
         </div>
      </div>

      <div class="row">
         <div class="col-3">
            <span class="report-data-col">
               Teléfono 1: {{ $customer->phone['line_1'] }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-col">
               Teléfono 2: {{ $customer->phone['line_2'] }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-col">
               Móvil 1: {{ $customer->phone['mobile_1'] }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-col">
               Móvil 2: {{ $customer->phone['mobile_2'] }}
            </span>
         </div>
      </div>

      <hr>

      @endforeach

      <div class="row mt-4">
         <div class="col-3">
            <a href="{{ route('customers.reports.parameters', 3) }}" class="btn btn-primary">
               Otra Consulta
            </a>
         </div>
      </div>
   </div>
</div>

@endsection

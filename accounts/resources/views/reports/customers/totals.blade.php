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
      <h4>Saldo por cliente</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Saldo por cliente</h3>
   </div>

   <div class="form-box-body">
      <h2>
         Desde: {{ $from_customer->name }}&nbsp;&nbsp;&nbsp;[{{ $from_customer->code }}]
      </h2>
      <h2>
         Hasta: {{ $to_customer->name }}&nbsp;&nbsp;&nbsp;[{{ $to_customer->code }}]
      </h2>
      <h5 class="mt-3">
         Fecha del listado: {{ LocalFormat::date(now()) }}
      </h5>

      <div class="row mt-4">
         <div class="col-2">
            <span class="report-title-col">
               Código
            </span>
         </div>
         <div class="col-4">
            <span class="report-title-col">
               Cliente
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-title-col">
               Saldo
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-title-col">
               Última compra
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-title-col">
               Último pago
            </span>
         </div>
      </div>

      @foreach ($totals as $total)
      <div class="row highlight">
         <div class="col-2">
            <span class="report-data-col">
               {{ $total['code'] }}
            </span>
         </div>
         <div class="col-4">
            <span class="report-data-col">
               {{ $total['name'] }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ LocalFormat::currency($total['balance']) }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ $total['last_invoice'] ? LocalFormat::date($total['last_invoice']) : '---' }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ $total['last_payment'] ? LocalFormat::date($total['last_payment']) : '---' }}
            </span>
         </div>
      </div>
      @endforeach

      <div class="row mt-2">
         <div class="col-2">
         </div>
         <div class="col-4">
         </div>
         <div class="col-2">
         </div>
         <div class="col-2 text-right">
            <span class="report-total-col">
               Total General:
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-total-col">
               {{ LocalFormat::currency($grand_total) }}
            </span>
         </div>
      </div>

      <div class="row mt-4">
         <div class="col-3">
            <a href="{{ route('customers.reports.parameters', 2) }}" class="btn btn-primary">
               Otra Consulta
            </a>
         </div>
      </div>
   </div>
</div>

@endsection

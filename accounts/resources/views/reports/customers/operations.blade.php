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
      <h4>Operaciones por cliente</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Operaciones por cliente</h3>
   </div>

   <div class="form-box-body">
      <h2>
         {{ $customer->name }}&nbsp;&nbsp;&nbsp;[{{ $customer->code }}]
      </h2>
      <h5>
         Desde {{ LocalFormat::date($from_date) }}
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         Hasta {{ LocalFormat::date($to_date) }}
         {{-- Desde {{ $from_date }} Hasta {{ $to_date }} --}}
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
               Importe
            </span>
         </div>
      </div>

      @foreach ($operations as $operation)
      <div class="row highlight">
         <div class="col-2">
            <span class="report-data-col">
               {{ LocalFormat::date($operation->created_at) }}
            </span>
         </div>
         <div class="col-3">
            <span class="report-data-col">
               {{ $operation instanceOf \App\Invoice ?
                     $operation->invoice_type->name :
                     'Recibo' }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ $operation->number }}
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-data-col">
               {{ $operation instanceOf \App\Invoice ?
                     LocalFormat::currency(
                        $operation->final_amount_with_tax()) :
                     LocalFormat::currency(
                        -$operation->total()) }}
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
               Total:
            </span>
         </div>
         <div class="col-2 text-right">
            <span class="report-total-col">
               {{ LocalFormat::currency($total) }}
            </span>
         </div>
      </div>

      <div class="row mt-4">
         <div class="col-3">
            <a href="{{ route('customers.reports.parameters', 0) }}" class="btn btn-primary">
               Otra Consulta
            </a>
         </div>
      </div>
   </div>
</div>

@endsection

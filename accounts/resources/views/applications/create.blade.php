@extends('layouts.fnapp')

@push('styles')
<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<style>.swal-footer { text-align: center; }</style>
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
      <h4>Imputación de comprobantes</h4>
   </span>
</div>

@if (session('status'))
<div class="alert alert-success">
   {{ session('status') }}
</div>    
@endif

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Imputación de comprobantes</h3>
   </div>

   <form action="{{ route('applications.create') }}" id="refresh_form">
      <input type="hidden" name="customer_id" id="query">
   </form>

   <form action="{{ route('applications.store') }}" method="post" id="application_form">

      @csrf

      <div class="form-row">
         <div class="col-3">
            <label for="date" class="mb-1">Fecha</label>
            <input type="date" class="form-control form-control-lg font-weight-bold @error('header.date') is-invalid @enderror" id="date" name="header[date]" value="{{ old('header.date', now()->format('Y-m-d')) }}">
            @error('header.date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-6">
            <label for="customer" class="mb-1">Cliente</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('header.customer_id') is-invalid @enderror" id="customer" name="header[customer_id]" autofocus>
               @foreach ($customers as $customer)
                  <option value="{{ $customer->id }}" {{ old('header.customer_id', request()->query('customer_id')) == $customer->id ? 'selected' : '' }}>
                     {{ $customer->code . ' - ' . $customer->name }}
                  </option>
               @endforeach
            </select>
            @error('header.customer_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-3">
         <div class="col-9">
            <label for="applicant_id" class="mb-1">Aplicar con</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('header.applicant_id') is-invalid @enderror @error('header.applicant_remaining') is-invalid @enderror" id="applicant_id" name="header[applicant_id]">
               @foreach ($apply_from as $applicant)
                  <option value="{{ $applicant['applicant_id'] }}"
                     data-applicant-type="{{ $applicant['applicant_type'] }}"
                     data-remaining="{{ $applicant['remaining'] }}"
                  >
                     {{ $applicant['applicant_info'] }}
                  </option>
               @endforeach
            </select>
            @error('header.applicant_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            @error('header.applicant_remaining')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <input type="hidden" id="applicant_type" name="header[applicant_type]">
            <input type="hidden" id="applicant_remaining" name="header[applicant_remaining]">
         </div>
      </div>

      <hr class="my-4">

      <div class="form-row mt-2">
         <div class="col-3">
            Aplicar a
         </div>

         <div class="col-3">
            Número
         </div>

         <div class="col-2">
            Fecha
         </div>

         <div class="col-2">
            Restante
         </div>

         <div class="col-2">
            Aplicar importe
         </div>
      </div>

      <section id="item-rows">
         @foreach ($apply_to as $invoice)

         <div class="form-row mt-1">
            <input type="hidden" id="invoice_id" name="item[{{$loop->iteration}}][invoice_id]" value="{{ $invoice['invoice_id'] }}">

            <input type="hidden" id="invoice_remaining" value="{{ $invoice['remaining'] }}">
            
            <div class="col-3">
               <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold" id="invoice_name" value="{{ $invoice['invoice_name'] }}" tabindex="-1">
            </div>

            <div class="col-3">
               <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold" id="invoice_number" value="{{ $invoice['invoice_number'] }}" tabindex="-1">
            </div>

            <div class="col-2">
               <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold" id="invoice_date" value="{{ $invoice['invoice_date'] }}" tabindex="-1">
            </div>

            <div class="col-2">
               <input type="text" readonly class="form-control-plaintext form-control-lg font-weight-bold" id="remaining" value="{{ LocalFormat::currency($invoice['remaining']) }}" tabindex="-1">
            </div>

            <div class="col-2">
               <input type="text" class="form-control form-control-lg font-weight-bold @error('item.' . $loop->iteration . '.amount') is-invalid @enderror" id="amount" name="item[{{$loop->iteration}}][amount]" value="{{ old('item.' . $loop->iteration . '.amount', '0.00') }}">
               @error('item.' . $loop->iteration . '.amount')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </div>
         </div>
             
         @endforeach
      </section>

      <div class="form-row mt-4">
         <div class="col-3">
         </div>

         <div class="col-5">
         </div>

         <div class="col-2 lead font-weight-bold">
            Total aplicado
         </div>

         <div class="col-2 lead font-weight-bold" id="total">
            $ 0,00
         </div>
      </div>

      <div class="form-row mt-2">
         <div class="col-3">
         </div>

         <div class="col-5">
         </div>

         <div class="col-2 font-weight-bold">
            Restante x aplicar
         </div>

         <div class="col-2 font-weight-bold" id="remaining_to_apply">
            $ 0,00
         </div>
      </div>

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary" id="saveBtn">
               Aplicar
            </button>
            <a href="{{ route('home') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

@push('scripts')
   <script src="{{ asset('js/application.js') }}"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

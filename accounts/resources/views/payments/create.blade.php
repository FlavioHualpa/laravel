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
      <h4>Pagos</h4>
   </span>
</div>

@if (session('status'))
<div class="alert alert-primary">
   {{ session('status') }}
</div>    
@endif

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Ingreso de pagos</h3>
   </div>

   <form action="{{ route('payments.store') }}" method="post" id="payment_form">

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
                  <option value="{{ $customer->id }}" {{ old('header.customer_id') == $customer->id ? 'selected' : '' }}>
                     {{ $customer->code . ' - ' . $customer->name }}
                  </option>
               @endforeach
            </select>
            @error('header.customer_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="number" class="mb-1">Número de recibo</label>
            <input type="number" class="form-control form-control-lg font-weight-bold @error('header.number') is-invalid @enderror" id="number" name="header[number]" value="{{ old('header.number') }}" min="1">
            @error('header.number')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <hr class="my-4">

      <div class="form-row mt-2">
         <div class="col-2">
            <div class="row">
               <div class="col-3 pr-0">
                  #
               </div>
               <div class="col-9 pl-0">
                  Valor
               </div>
            </div>
         </div>

         <div class="col-2">
            Importe
         </div>

         <div class="col-2">
            Comentario
         </div>

         <div class="col-2">
            Banco
         </div>

         <div class="col-2">
            Número
         </div>

         <div class="col-2">
            Fecha
         </div>
      </div>

      {{--
      <datalist id="codes_list">
      @foreach ($payment_methods as $method)
         <option value="{{ $method->code }}"></option>
      @endforeach
      </datalist>
      --}}

      <section id="item-rows">
      </section>

      <div class="form-row mt-3">
         <div class="col-3">
         </div>

         <div class="col-5">
         </div>

         <div class="col-2 lead font-weight-bold">
            Total
         </div>

         <div class="col-2 lead font-weight-bold" id="total">
            $ 0,00
         </div>
      </div>

      @include('payments.templates')

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary" id="saveBtn">
               Ingresar Pago
            </button>
            <a href="{{ route('home') }}" class="btn btn-dark">
               Cancelar
            </a>
            <div class="btn-group">
               <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Agregar
               </a>

               <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  @foreach ($payment_methods as $method)
                  <a class="dropdown-item" href="#" data-method-type-code="{{ $method->payment_method_type->code }}" data-method-code="{{ $method->code }}" data-method-id="{{ $method->id }}">
                     {{ $method->name }}
                  </a>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </form>
</div>
@endsection

@push('scripts')
   <script src="{{ asset('js/payment.js') }}"></script>
   <script src="{{ asset('js/dropdown.js') }}"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

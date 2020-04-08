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
      <h4>Parámetros</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>{{ $parameters['title'] }}</h3>
   </div>

   <form action="{{ $parameters['route'] }}" method="post">

      @csrf

      <div class="form-row">

         <div class="col-6">
            <label for="from_customer" class="mb-1">Desde Cliente</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('from_customer_id') is-invalid @enderror" id="from_customer" name="from_customer_id" autofocus>
               @foreach ($customers as $customer)
                  <option value="{{ $customer->id }}" {{ old('from_customer_id') == $customer->id ? 'selected' : '' }}>
                     {{ $customer->code . ' - ' . $customer->name }}
                  </option>
               @endforeach
            </select>
            @error('from_customer_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @if ($parameters['show_to_customer'])

         <div class="col-6">
            <label for="to_customer" class="mb-1">Hasta Cliente</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('to_customer_id') is-invalid @enderror" id="to_customer" name="to_customer_id">
               @foreach ($customers as $customer)
                  <option value="{{ $customer->id }}" {{ old('to_customer_id') == $customer->id ? 'selected' : '' }}>
                     {{ $customer->code . ' - ' . $customer->name }}
                  </option>
               @endforeach
            </select>
            @error('to_customer_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @endif

      </div>

      <div class="form-row mt-3">

         @if ($parameters['show_from_date'])

         <div class="col-3">
            <label for="from_date" class="mb-1">Desde Fecha</label>
            <input type="date" class="form-control form-control-lg font-weight-bold @error('from_date') is-invalid @enderror" id="from_date" name="from_date" value="{{ old('from_date', now()->format('Y-m-d')) }}">
            @error('from_date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @endif

         @if ($parameters['show_to_date'])

         <div class="col-3">
            <label for="to_date" class="mb-1">Hasta Fecha</label>
            <input type="date" class="form-control form-control-lg font-weight-bold @error('to_date') is-invalid @enderror" id="to_date" name="to_date" value="{{ old('to_date', now()->format('Y-m-d')) }}">
            @error('to_date')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>

         @endif
      
      </div>

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary" id="showBtn">
               Ver listado
            </button>
            <a href="{{ route('customers.reports.index') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>

   </form>

</div>
@endsection

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
      <a href="{{ route('bank-accounts.home') }}">
         <h4>Cuentas Bancarias</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Ingresar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Nueva Cuenta Bancaria</h3>
   </div>

   <form action="{{ route('bank-accounts.store') }}" method="post">

      @csrf

      <div class="form-row">
         <div class="col-4">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code') }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-4">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-4">
            <label for="number" class="mb-1">Número</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}">
            @error('number')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-1">
         <div class="col-8">
            <label for="bank_id" class="mb-1">Banco</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('bank_id') is-invalid @enderror" id="bank_id" name="bank_id">
               @foreach ($banks as $bank)
                  <option value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>
                     {{ $bank->name }}
                  </option>
               @endforeach
               @error('bank_id')
               <p class="text-danger">{{ $message }}</p>
               @enderror
            </select>
         </div>
      </div>
      
      {{-- el campo oculto company_id necesario para crear la cuenta --}}
      <input type="hidden" name="company_id"
         value="{{ session('active_company')->id }}">

      <div class="form-row mt-4">
         <div class="col">
            <button type="submit" class="btn btn-primary">Crear Cuenta Bancaria</button>
            <a href="{{ route('bank-accounts.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

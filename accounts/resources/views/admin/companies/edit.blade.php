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
      <a href="{{ route('admin.home') }}">
         <h4>Administración de cuenta</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <a href="{{ route('admin.companies.search') }}">
         <h4>Empresas</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Modificar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Modificar Empresa</h3>
   </div>

   <form action="{{ route('admin.companies.update', $company->id) }}" method="post">

      @csrf
      @method('patch')

      <div class="form-row">
         <div class="col-4">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $company->code) }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-8">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $company->name) }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-5">
         <div class="col-5">
            <label for="address[street]" class="mb-1">Calle</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.street') is-invalid @enderror" id="address[street]" name="address[street]" value="{{ old('address.street', $company->address['street'] ?? null) }}">
            @error('address.street')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="address[door]" class="mb-1">Número</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.door') is-invalid @enderror" id="address[door]" name="address[door]" value="{{ old('address.door', $company->address['door'] ?? null) }}">
            @error('address.door')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="address[floor]" class="mb-1">Piso</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.floor') is-invalid @enderror" id="address[floor]" name="address[floor]" value="{{ old('address.floor', $company->address['floor'] ?? null) }}">
            @error('address.floor')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="address[apartment]" class="mb-1">Depto.</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.apartment') is-invalid @enderror" id="address[apartment]" name="address[apartment]" value="{{ old('address.apartment', $company->address['apartment'] ?? null) }}">
            @error('address.apartment')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-2">
         <div class="col-5">
            <label for="address[city]" class="mb-1">Ciudad</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.city') is-invalid @enderror" id="address[city]" name="address[city]" value="{{ old('address.city', $company->address['city'] ?? null) }}">
            @error('address.city')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="address[state_id]" class="mb-1">Provincia</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('address.state_id') is-invalid @enderror" id="address[state_id]" name="address[state_id]">
               @foreach ($states as $state)
                  <option value="{{ $state->id }}" {{ old('address.state_id', $company->address['state_id'] ?? null) == $state->id ? 'selected' : '' }}>
                     {{ $state->name }}
                  </option>
               @endforeach
            </select>
            @error('address.state_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="address[zip]" class="mb-1">Código Postal</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.zip') is-invalid @enderror" id="address[zip]" name="address[zip]" value="{{ old('address.zip', $company->address['zip'] ?? null) }}">
            @error('address.zip')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-5">
         <div class="col-3">
            <label for="phone[line_1]" class="mb-1">Línea 1</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('phone.line_1') is-invalid @enderror" id="phone[line_1]" name="phone[line_1]" value="{{ old('phone.line_1', $company->phone['line_1'] ?? null) }}">
            @error('phone.line_1')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="phone[line_2]" class="mb-1">Línea 2</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('phone.line_2') is-invalid @enderror" id="phone[line_2]" name="phone[line_2]" value="{{ old('phone.line_2', $company->phone['line_2'] ?? null) }}">
            @error('phone.line_2')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="phone[mobile_1]" class="mb-1">Móvil 1</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('phone.mobile_1') is-invalid @enderror" id="phone[mobile_1]" name="phone[mobile_1]" value="{{ old('phone.mobile_1', $company->phone['mobile_1'] ?? null) }}">
            @error('phone.mobile_1')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="phone[mobile_2]" class="mb-1">Móvil 2</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('phone.mobile_2') is-invalid @enderror" id="phone[mobile_2]" name="phone[mobile_2]" value="{{ old('phone.mobile_2', $company->phone['mobile_2'] ?? null) }}">
            @error('phone.mobile_2')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-5">
         <div class="col-4">
            <label for="email" class="mb-1">E-mail</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $company->email) }}">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-4">
            <label for="fiscal_id" class="mb-1">CUIT</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('fiscal_id') is-invalid @enderror" id="fiscal_id" name="fiscal_id" value="{{ old('fiscal_id', $company->fiscal_id) }}">
            @error('fiscal_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-4">
            <label for="condition_id" class="mb-1">Condición</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('condition_id') is-invalid @enderror" id="condition_id" name="condition_id">
               @foreach ($conditions as $condition)
                  <option value="{{ $condition->id }}" {{ old('condition_id', $company->condition_id) == $condition->id ? 'selected' : '' }}>
                     {{ $condition->name }}
                  </option>
               @endforeach
            </select>
            @error('condition_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto account_id necesario para modificar la empresa --}}
      <input type="hidden" name="account_id"
         value="{{ $company->account_id }}">

      <div class="form-row mt-4">
         <div class="col">
            <button type="submit" class="btn btn-primary">Modificar Empresa</button>
            <a href="{{ route('admin.companies.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

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
      <a href="{{ route('admin.transports.search') }}">
         <h4>Transportes</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Modificar</h4>
   </span>
</div>

<div class="form-box mt-5">
   <div class="form-box-header">
      <h3>Modificar Transporte</h3>
   </div>

   <form action="{{ route('admin.transports.update', $transport->id) }}" method="post">

      @csrf
      @method('patch')

      <div class="form-row">
         <div class="col-4">
            <label for="code" class="mb-1">Código</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $transport->code) }}">
            @error('code')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-8">
            <label for="name" class="mb-1">Nombre</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $transport->name) }}">
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-5">
         <div class="col-5">
            <label for="address[street]" class="mb-1">Calle</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.street') is-invalid @enderror" id="address[street]" name="address[street]" value="{{ old('address.street', $transport->address['street'] ?? null) }}">
            @error('address.street')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="address[door]" class="mb-1">Número</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.door') is-invalid @enderror" id="address[door]" name="address[door]" value="{{ old('address.door', $transport->address['door'] ?? null) }}">
            @error('address.door')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="address[floor]" class="mb-1">Piso</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.floor') is-invalid @enderror" id="address[floor]" name="address[floor]" value="{{ old('address.floor', $transport->address['floor'] ?? null) }}">
            @error('address.floor')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-2">
            <label for="address[apartment]" class="mb-1">Depto.</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.apartment') is-invalid @enderror" id="address[apartment]" name="address[apartment]" value="{{ old('address.apartment', $transport->address['apartment'] ?? null) }}">
            @error('address.apartment')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-2">
         <div class="col-5">
            <label for="address[city]" class="mb-1">Ciudad</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.city') is-invalid @enderror" id="address[city]" name="address[city]" value="{{ old('address.city', $transport->address['city'] ?? null) }}">
            @error('address.city')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="address[state_id]" class="mb-1">Provincia</label>
            <select class="custom-select custom-select-lg font-weight-bold @error('address.state_id') is-invalid @enderror" id="address[state_id]" name="address[state_id]">
               @foreach ($states as $state)
                  <option value="{{ $state->id }}" {{ old('address.state_id', $transport->address['state_id'] ?? null) == $state->id ? 'selected' : '' }}>
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
            <input type="text" class="form-control form-control-lg font-weight-bold @error('address.zip') is-invalid @enderror" id="address[zip]" name="address[zip]" value="{{ old('address.zip', $transport->address['zip'] ?? null) }}">
            @error('address.zip')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="form-row mt-5">
         <div class="col-3">
            <label for="phone[line_1]" class="mb-1">Línea 1</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('phone.line_1') is-invalid @enderror" id="phone[line_1]" name="phone[line_1]" value="{{ old('phone.line_1', $transport->phone['line_1'] ?? null) }}">
            @error('phone.line_1')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
         <div class="col-3">
            <label for="phone[line_2]" class="mb-1">Línea 2</label>
            <input type="text" class="form-control form-control-lg font-weight-bold @error('phone.line_2') is-invalid @enderror" id="phone[line_2]" name="phone[line_2]" value="{{ old('phone.line_2', $transport->phone['line_2'] ?? null) }}">
            @error('phone.line_2')
            <p class="text-danger">{{ $message }}</p>
            @enderror
         </div>
      </div>

      {{-- el campo oculto account_id necesario para modif el transporte --}}
      <input type="hidden" name="account_id"
         value="{{ auth('admin')->id() }}">

      <div class="form-row mt-5">
         <div class="col">
            <button type="submit" class="btn btn-primary">Modificar Transporte</button>
            <a href="{{ route('admin.transports.search') }}" class="btn btn-dark">
               Cancelar
            </a>
         </div>
      </div>
   </form>
</div>
@endsection

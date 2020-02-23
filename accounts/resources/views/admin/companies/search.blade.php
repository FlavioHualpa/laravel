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
         <h4>Adminstración de cuenta</h4>
      </a>
   </span>
   <span class="bread-crumb">
      <h4>Empresas</h4>
   </span>
</div>

<div class="form-box mb-4">
</div>

<table class="table table-striped table-dark">
   <thead>
      <tr>
         <th scope="col">
            <a href="{{ route('admin.companies.search') . App\OrderQuery::make('code') }}">
               Código
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('admin.companies.search') . App\OrderQuery::make('name') }}">
               Nombre
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('admin.companies.search') . App\OrderQuery::make('street') }}">
               Domicilio
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('admin.companies.search') . App\OrderQuery::make('fiscal_id') }}">
               CUIT
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('admin.companies.search') . App\OrderQuery::make('created_at') }}">
               Fecha de Alta
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($companies as $company)
      <tr>
         <td>
            <a href="{{ route('admin.companies.edit', $company->id) }}">
               {{ $company->code }}
            </a>
         </td>
         <td>{{ $company->name }}</td>
         <td>{{ $company->full_address }}</td>
         <td>{{ $company->fiscal_id }}</td>
         <td>{{ $company->created_at->format('d-m-Y 🕒 H:i') }}</td>
      </tr>
      @empty
      <tr>
         <td colspan="5">No hay empresas</td>
      </tr>
      @endforelse
   </tbody>
</table>

<a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
   Ingresar una empresa
</a>
<a href="{{ route('admin.home') }}" class="btn btn-dark ml-2">
   Volver
</a>
@endsection

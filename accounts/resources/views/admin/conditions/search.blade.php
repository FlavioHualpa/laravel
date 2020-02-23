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
      <h4>Condiciones Impositivas</h4>
   </span>
</div>

<div class="form-box mb-4">
</div>

<table class="table table-striped table-dark">
   <thead>
      <tr>
         <th scope="col">
            <a href="{{ route('admin.conditions.search') . App\OrderQuery::make('code') }}">
               Código
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('admin.conditions.search') . App\OrderQuery::make('name') }}">
               Condición Impositiva
            </a>
         </th>
         <th scope="col">
            <a href="{{ route('admin.conditions.search') . App\OrderQuery::make('created_at') }}">
               Fecha de Alta
            </a>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($conditions as $condition)
      <tr>
         <td>
            <a href="{{ route('admin.conditions.edit', $condition->id) }}">
               {{ $condition->code }}
            </a>
         </td>
         <td>
            {{ $condition->name }}
         </td>
         <td>
            {{ $condition->created_at->format('d-m-Y 🕒 H:i') }}
         </td>
      </tr>
      @empty
      <tr>
         <td colspan="2">No hay condiciones impositivas</td>
      </tr>
      @endforelse
   </tbody>
</table>

<a href="{{ route('admin.conditions.create') }}" class="btn btn-primary">
   Ingresar una condición impositiva
</a>
<a href="{{ route('admin.home') }}" class="btn btn-dark ml-2">
   Volver
</a>
@endsection

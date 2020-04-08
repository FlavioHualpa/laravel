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
   <div class="row">
      <div class="col-2">
      </div>

      <div class="col-2">
         <img src="{{ asset('img/constructor.png') }}" alt="constructor" class="constructor">
      </div>

      <div class="col-8">
         <h2 class="no-company-title">
            Lo sentimos, el listado solicitado no está disponible
         </h2>
         <h3 class="no-company-title">
            Consulta con el administrador del sistema
         </h3>
         <p>&nbsp;</p>
         <a href="{{ route('customers.reports.index') }}" class="btn btn-primary">
            Volver a los listados
         </a>
      </div>
   </div>
@endsection

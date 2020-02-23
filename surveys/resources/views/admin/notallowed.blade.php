@extends('..\layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="sign">
            <img src="{{ asset('img/guard.png') }}" alt="Guardian" class="sign-icon">
            <div>
               <h2>Lo sentimos,</h2>
               <h4>No estás autorizado para acceder a esta sección</h4>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

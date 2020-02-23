@extends('..\layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">
               <h5 class="font-weight-bold">Gracias, {{ $name ?? '' }}. Hemos recibido tu encuesta.</h5>
            </div>
            <div class="card-body">
               <a href="{{ route('home') }}" class="btn btn-primary">
                  Ir al inicio
               </a>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

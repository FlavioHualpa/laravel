@extends('layouts.main')

@section('content')

      <!-- Main Content Wrapper Start -->
      <div id="content" class="main-content-wrapper">
         <div class="page-content-inner">
            <div class="container">
               <div class="row justify-content-center ptb--100">
                  <div class="col-lg-8 text-center">
                     <div>
                        <h2 class="confirmation-text mt--20">
                           Recibimos tu pedido!
                        </h2>
                        <h4 class="confirmation-text mb--40">
                           Te enviamos un mail con los detalles del mismo.
                        </h4>
                        <h4 class="confirmation-text mb--40">
                           Muchas gracias!
                        </h4>
                        <a
                           href="{{ route('home') }}"
                           class="btn btn-style-1"
                           style="text-transform: none;"
                        >
                           Ir a la página inicial
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Main Content Wrapper Start -->

@endsection

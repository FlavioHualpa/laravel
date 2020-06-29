@extends('layouts.main')

@section('content')

      <!-- Main Content Wrapper Start -->
      <div id="content" class="main-content-wrapper text-center my-large">

         <i class="fa fa-frown-o big-icon" aria-hidden="true"></i>

         <h1 class="error-title mb-5">404</h1>
         
         <p class="error-text">
            Lamentamos, la url que solicitaste no existe
         </p>
         
         <p class="error-text">
            Presiona <a href="{{ route('home') }}">aquí</a> para ir a la página principal
         </p>

      </div>
      <!-- Main Content Wrapper End -->

@endsection

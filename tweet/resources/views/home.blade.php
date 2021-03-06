@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8 rounded" style="background-color: rgba(0,0,0,0.1);">
         <div class="d-flex align-items-center my-3">
            <img src="https:\\i.pravatar.cc\200?u={{ auth()->user()->email }}" alt="{{ auth()->user()->name }}" style="width: 60px;" class="rounded-circle mr-3">

            <h3 class="mb-0">Hola {{ $first_name }}, tus últimos tweets</h3>
         </div>
      </div>

      @include('partials.tweets')
   </div>
</div>
@endsection

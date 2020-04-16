@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8 rounded" style="background-color: rgba(0,0,0,0.1);">
         <div class="d-flex align-items-center my-3">
            <img src="https:\\i.pravatar.cc\200?u={{ $user->email }}" alt="{{ $user->name }}" style="width: 120px;" class="rounded mr-3">

            <div>
               <h5>{{ auth()->user()->follows_status($user) }}</h5>
               <h3 class="mb-0">{{ $user->name }}</h3>
            </div>
         </div>
      </div>

      @include('partials.tweets')
   </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
   <section class="row justify-content-center">
      <header class="col-md-10 rounded" style="background-color: rgba(0,0,0,0.1);">
         <div class="d-flex align-items-center my-3">
            <img src="https:\\i.pravatar.cc\200?u={{ $user->email }}" alt="{{ $user->name }}" style="width: 120px;" class="rounded mr-3">

            <div>
               <h3>
                  {{ $user->name }}
               </h3>
               <h5>
                  Te registraste el {{ $user->created_at->format('d/m/Y') }}
               </h5>
               <h5>
                  {{ $user->tweets()->count() }} tweets
               </h5>
            </div>
         </div>
      </header>
   </section>

   <section class="row justify-content-center mt-5">
      <div class="col-md-10">
         <h3>Estás siguiendo a {{ $following->count() }} usuarios</h3>
         <div class="row">
            @include('partials.group', [
               'group' => $following,
            ])
         </div>
      </div>
   </section>

   <section class="row justify-content-center mt-5">
      <div class="col-md-10">
         <h3>Te siguen {{ $followers->count() }} usuarios</h3>
         <div class="row">
            @include('partials.group', [
               'group' => $followers,
            ])
         </div>
      </div>
   </section>

   <section class="row justify-content-center mt-5">
      <div class="col-md-10">
         <h3>Quizás te interese seguir a</h3>
         <div class="row">
            @include('partials.group', [
               'group' => $unrelated,
            ])
         </div>
      </div>
   </section>
</div>
@endsection

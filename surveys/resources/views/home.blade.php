@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h5 class="card-header">Hola, {{ auth()->user()->name }}</h5>
            
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               
               <a href="{{ route('qnr.create') }}" class="btn btn-primary">
                  {{ trans('Create Questionnaire') }}
               </a>
            </div>
         </div>
         
         @if ($questionnaires->count())
            <h3 class="mt-4 mb-1">Tus cuestionarios creados:</h3> 
         @endif
         
         @foreach ($questionnaires as $q)
         <div class="card mt-4">
            <div class="card-body">
               <h5 class="card-title font-weight-bold">{{ $q->name }}</h5>
               <h6 class="card-subtitle mb-2">
                  <a href="{{ $q->privateUrl() }}" class="card-link">
                     Ver el questionario
                  </a>
               </h6>
               @if ($q->surveys()->count() > 0)
                  <h6 class="font-weight-bold mt-3">
                     Encuestas recibidas: {{ $q->surveys()->count() }}
                  </h6>
               @endif
               <p class="card-text mt-3 mb-0">
                  Url para tomar el questionario:
               </p>
               <a href="{{ $q->surveyUrl() }}" class="card-link">
                  {{ $q->surveyUrl() }}
               </a>
               
               <form action="{{ route('qnr.delete') }}" method="post">
                  @csrf
                  @method('delete')
                  <input type="hidden" name="questionnaire_id" value="{{ $q->id }}">
                  <button type="submit" class="btn btn-sm btn-outline-danger mt-3">Eliminar</button>
               </form>
            </div>
         </div>
         @endforeach
         
      </div>
   </div>
</div>

@endsection

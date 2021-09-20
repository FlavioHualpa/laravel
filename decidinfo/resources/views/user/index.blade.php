@extends('user.layout')

@section('content')
   <h1 class="text-3xl italic mb-6">
      {{ auth()->user()->gender == 'F' ? 'Bienvenida' : 'Bienvenido' }}
      {{ auth()->user()->first_name }}
   </h1>

   @if ($surveys->count() > 0)

      <h3 class="text-lg text-blue-600 mb-6">
         Mirá cómo están tus encuestas
      </h3>

      @foreach ($surveys as $survey)
         <x-survey.card>
            <x-survey.summary :survey="$survey" />
         </x-survey.card>
      @endforeach

   @else

      <h3 class="text-lg text-blue-600 mb-6">
         Parece que no creaste ninguna encuesta todavía
      </h3>

      <h4 class="text-blue-600 mb-6">
         ¿Qué te parece crear una ahora mismo?
      </h4>

      <a href="{{ route('surveys.create') }}"
         class="py-1 px-4 bg-blue-600 text-white hover:bg-blue-500"
      >
         Claro, vamos ahí
      </a>

   @endif

@endsection
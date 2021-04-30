@extends('layouts.app')

@section('content')

   <main class="container mx-auto">
      <img src="{{ asset('img/EquizLogo.jpg') }}" alt="Equiz" class="w-24 mx-auto mt-8">

      <h1 class="text-3xl text-center mt-12">
         Felicitaciones, te registraste en <span class="text-teal-600">Equiz</span>
      </h1>

      <p class="text-center text-lg mt-4">
         Para habilitarte como usuario necesitamos que nos confirmes tu dirección de email tocando el link que te enviamos a {{ auth()->user()->email }}.
      </p>

      <form action="{{ route('verification.send') }}" method="post">
         @csrf
         <p class="text-center text-lg mt-4">
            Si no recibiste el email te lo podemos
            <input type="submit" value="enviar nuevamente" class="bg-transparent text-teal-600 cursor-pointer hover:underline">
         </p>
      </form>

      @session('status')
         <p class="mt-2 py-3 px-6 text-lg text-green-700 bg-green-200 border b-green-700 rounded">
            Te reenviamos el email. Por favor revisá tu correo.
         </p>
      @endsession

      <p class="text-center text-lg mt-4">
         Esperamos que disfrutes tu experiencia en <span class="text-teal-600">Equiz</span>
      </p>
   </main>

@endsection
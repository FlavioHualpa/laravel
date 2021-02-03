@extends('layouts.simple')

@section('content')
   <main class="h-screen flex flex-col justify-center items-center">
      <div class="bg-white p-12 w-2/3 md:w-1/2 xl:w-1/3 rounded-lg shadow">
         <div class="mb-8">
            <img
               src="{{ asset('img/site/shopping-cart.png') }}"
               alt="Shop"
               class="w-24 mx-auto"
            >
         </div>

         @if (session('status') == 'verification-link-sent')
            <p class="w-80 mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-100 text-green-600">
               {{ trans('passwords.sent') }}
            </p>
         @endif

         <h1 class="text-2xl text-center font-bold mb-6">
            Hola {{ auth()->user()->first_name }}
         </h1>

         <h2 class="text-xl text-center font-bold mb-12">
            Necesitamos verificar tu dirección de correo electrónico
         </h2>

         <p class="text-lg mb-4">
            Te hemos enviado un email a {{ auth()->user()->email }} con un link que debes tocar para verificar tu dirección y terminar de activar tu cuenta.
         </p>
   
         <p class="text-lg mb-4">
            Por favor verifica tus correos y si no encuentras nuestro mensaje también revisa tu carpeta de correo basura.
         </p>
   
         <p class="text-lg mb-4">
            El link en el mensaje es válido solo por una hora desde que fue enviado. Si ya ha pasado más tiempo o si no puedes encontrar el mensaje por favor toca el link más abajo para que te enviemos uno nuevamente.
         </p>

         <form action="{{ route('verification.send') }}" method="post">
            @csrf
            <button type="submit" class="block mb-8 mx-auto py-2 px-6 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
               Reenviar correo de verificación
            </button>
         </form>

         @if (session()->has('sent-message'))
            <p class="w-72 mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-200 text-green-600">
               {{ session('sent-message') }}
            </p>
         @endif

         <p class="text-lg">
            Muchas gracias.
         </p>
      </div>
   </main>
@endsection

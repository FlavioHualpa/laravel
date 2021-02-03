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

         <h1 class="text-2xl text-center font-bold mb-6">
            Si olvidaste tu contraseña...
         </h1>

         <p class="text-lg mb-4">
            No te preocupes, te enviaremos un correo a donde nos indiques con un link para que puedas ingresar una nueva.
         </p>
   
         <form action="{{ route('password.email') }}" method="post">
            @csrf

            <div class="mb-8">
               <label for="email" class="block">
                  Correo electrónico
               </label>
               <input
                  type="email"
                  id="email"
                  name="email"
                  value="{{ old('email') }}"
                  required
                  autofocus
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('email') border-red-500 @enderror"
               >
               @error('email')
               <p class="text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <button type="submit" class="block mb-8 mx-auto py-2 px-6 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
               Enviar correo
            </button>
         </form>

         @if (session()->has('status'))
            <p class="w-80 mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-200 text-green-600">
               {{ session('status') }}
            </p>
         @endif
      </div>
   </main>
@endsection

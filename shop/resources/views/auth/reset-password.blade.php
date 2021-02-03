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

         <h1 class="text-2xl text-center font-bold mb-12">
            Ingresa tu nueva contraseña
         </h1>

         <form action="{{ route('password.update') }}" method="post">
            @csrf

            <input type="hidden" name="email" value="{{ request('email') }}">
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <div class="mb-8">
               <label for="password" class="block">
                  Nueva contraseña
               </label>
               <input
                  type="password"
                  id="password"
                  name="password"
                  required
                  autofocus
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('password') border-red-500 @enderror"
               >
               @error('password')
               <p class="mt-1 text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8">
               <label for="password_confirmation" class="block">
                  Confirma la contraseña
               </label>
               <input
                  type="password"
                  id="password_confirmation"
                  name="password_confirmation"
                  required
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('password_confirmation') border-red-500 @enderror"
               >
               @error('password_confirmation')
               <p class="mt-1 text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <button type="submit" class="block mb-8 mx-auto py-2 px-6 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
               Confirmar
            </button>
         </form>

         @if (session()->has('status'))
            <p class="w-80 mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-100 text-green-600">
               {{ session('status') }}
            </p>
         @endif
      </div>
   </main>
@endsection

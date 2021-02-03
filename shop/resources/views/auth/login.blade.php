@extends('layouts.simple')

@section('content')
   <main class="h-screen flex flex-col justify-center items-center">
      <div class="bg-white p-12 w-2/3 md:w-1/2 xl:w-1/3 rounded-lg shadow">
         <h1 class="text-2xl text-center font-bold mb-12">
            Inicia sesión en tu cuenta
         </h1>

         @if (session()->has('status'))
            <p class="w-80 mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-100 text-green-600">
               {{ session('status') }}
            </p>
         @endif
   
         <form action="{{ route('login') }}" method="post">
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

            <div class="mb-8">
               <label for="password" class="block">
                  Contraseña
               </label>
               <input
                  type="password"
                  id="password"
                  name="password"
                  required
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('password') border-red-500 @enderror"
               >
               @error('password')
               <p class="text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8 flex justify-between">
               <div>
                  <input
                     type="checkbox"
                     id="remember"
                     name="remember"
                     class="border border-gray-300 shadow-sm mr-1 transform scale-125 transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50"
                     {{ old('remember') ? 'checked' : '' }}
                  >
                  <label for="remember">
                     Recúerdame
                  </label>
               </div>
               <div>
                  <a
                     href="{{ route('password.request') }}"
                     class="text-orange-600 hover:text-orange-500 transition duration-200"
                  >
                     Olvidaste tu contraseña?
                  </a>
               </div>
            </div>

            <div class="mb-8">
               <button type="submit" class="w-full py-2 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                  Iniciar Sesión
               </button>
            </div>

            <div>
               No tienes una cuenta?
               <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-500 transition duration-200">
                     Regístrate aquí
               </a>
            </div>
         </form>
      </div>
   </main>
@endsection

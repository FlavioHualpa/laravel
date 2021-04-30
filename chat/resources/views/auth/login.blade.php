@extends('layouts.app')

@section('content')

   <main class="w-3/4 lg:w-2/4 xl:w-1/3 xl:min-w-128 mx-auto mt-8 px-12 sm:px-24 py-8 bg-green-300 shadow rounded-lg">

      <h2 class="text-2xl text-green-800 text-center font-bold my-10">
         Ingresar a la sala de chat
      </h2>

      <div>
         <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="mt-3">
               <label for="email" class="text-sm text-green-600 font-bold block">
                  Email
               </label>
               <input type="text" id ="email" name="email" class="px-4 py-2 rounded-md outline-none w-full text-gray-700 font-bold border border-gray-500 focus:border-green-500 focus:ring-2 ring-green-400 transition duration-200 @error('email') border-red-600 @enderror" value="{{ old('email') }}" autofocus>
               @error('email')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
               @enderror
            </div>

            <div class="mt-3">
               <label for="password" class="text-sm text-green-600 font-bold block">
                  Contraseña
               </label>
               <input type="password" id="password" name="password" class="px-4 py-2 rounded-md outline-none w-full text-gray-700 font-bold border border-gray-500 focus:border-green-500 focus:ring-2 ring-green-400 transition duration-200 @error('password') border-red-600 @enderror">
               @error('password')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
               @enderror
            </div>

            <div class="mt-6 text-center">
               <button class="px-6 py-2 rounded-md text-white bg-green-700 hover:bg-green-500 transition duration-200 focus:outline-none focus:ring-2 ring-green-400">
                  Ingresar
               </button>
               <button type="submit" class="ml-2 px-6 py-2 rounded-md text-white bg-gray-700 hover:bg-gray-600 transition duration-200 focus:outline-none focus:ring-2 ring-gray-400" form="cancel_login">
                  Cancelar
               </button>
            </div>
         </form>
      </div>

      <form action="{{ route('home') }}" id="cancel_login">
      </form>
   </main>

@endsection
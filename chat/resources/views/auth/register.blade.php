@extends('layouts.app')

@section('content')

   <main class="w-3/4 lg:w-2/4 xl:w-1/4 xl:min-w-128 mx-auto mt-8 px-12 sm:px-24 py-8 bg-gray-400 shadow rounded-lg">

      <div class="mx-auto p-8 w-40 rounded-full" style="background-image: radial-gradient(#f2f2f2, transparent 80%);">
         <img src="{{ asset('img/EquizLogo.jpg') }}" alt="Equiz" class="w-full">
      </div>

      <h2 class="text-xl text-teal-600 text-center font-bold my-10">
         Registro de usuario
      </h2>

      <div>
         <form action="{{ route('register') }}" method="post">
            @csrf

            <div class="mt-3">
               <label for="name" class="text-sm text-teal-600 font-bold block">
                  Nombre
               </label>
               <input type="text" id ="name" name="name" class="px-4 py-2 rounded-md outline-none w-full text-gray-700 font-bold border border-gray-500 focus:border-teal-500 @error('name') border-red-600 @enderror" value="{{ old('name') }}" autofocus>
               @error('name')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
               @enderror
            </div>

            <div class="mt-3">
               <label for="email" class="text-sm text-teal-600 font-bold block">
                  Email
               </label>
               <input type="text" id ="email" name="email" class="px-4 py-2 rounded-md outline-none w-full text-gray-700 font-bold border border-gray-500 focus:border-teal-500 @error('email') border-red-600 @enderror" value="{{ old('email') }}">
               @error('email')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
               @enderror
            </div>

            <div class="mt-3">
               <label for="password" class="text-sm text-teal-600 font-bold block">
                  Contraseña
               </label>
               <input type="password" id="password" name="password" class="px-4 py-2 rounded-md outline-none w-full text-gray-700 font-bold border border-gray-500 focus:border-teal-500 @error('password') border-red-600 @enderror">
               @error('password')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
               @enderror
            </div>

            <div class="mt-3">
               <label for="password_confirmation" class="text-sm text-teal-600 font-bold block">
                  Reingresá la contraseña
               </label>
               <input type="password" id="password_confirmation" name="password_confirmation" class="px-4 py-2 rounded-md outline-none w-full text-gray-700 font-bold border border-gray-500 focus:border-teal-500 @error('password_confirmation') border-red-600 @enderror">
               @error('password_confirmation')
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
               @enderror
            </div>

            <div class="mt-6 text-center">
               <button class="px-6 py-2 rounded-md text-white bg-teal-700 hover:bg-teal-500 transition duration-200 focus:outline-none">
                  Enviar
               </button>
               <button type="submit" class="ml-2 px-6 py-2 rounded-md text-white bg-gray-700 hover:bg-gray-600 transition duration-200 focus:outline-none" form="cancel_regis">
                  Cancelar
               </button>
            </div>
         </form>
      </div>

      <form action="{{ route('home') }}" id="cancel_regis">
      </form>
   </main>

@endsection
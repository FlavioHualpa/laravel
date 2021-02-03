@extends('layouts.simple')

@section('content')
   <main class="min-h-screen flex flex-col justify-center items-center">
      <div class="bg-white p-12 w-2/3 md:w-1/2 xl:w-1/3 rounded-lg shadow">
         <h1 class="text-2xl text-center font-bold mb-12">
            Cambio de contraseña
         </h1>

         @if (session('status') == 'password-updated')
            <div class="flex justify-between w-full mb-8 mx-auto py-2 px-6 border border-green-400 rounded bg-green-100">
               <p class="text-green-600">
                  {{ trans('passwords.updated') }}
               </p>
               <a href="{{ route('home') }}"
                  class="text-black hover:underline hover:text-gray-500"
               >
                  {{ trans('passwords.home') }}
               </a>
            </div>
         @endif
   
         <form action="{{ route('user-password.update') }}" method="post">
            @csrf
            @method('put')

            <div class="mb-8">
               <label for="current_password" class="block text-gray-400">
                  Contraseña actual
               </label>
               <input
                  type="password"
                  id="current_password"
                  name="current_password"
                  required
                  autofocus
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('current_password', 'updatePassword') border-red-500 @enderror"
               >
               @error('current_password', 'updatePassword')
               <p class="mt-1 text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8">
               <label for="password" class="block text-gray-400">
                  Nueva contraseña
               </label>
               <input
                  type="password"
                  id="password"
                  name="password"
                  required
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('password', 'updatePassword') border-red-500 @enderror"
               >
               @error('password', 'updatePassword')
               <p class="mt-1 text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8">
               <label for="password_confirmation" class="block text-gray-400">
                  Repite la contraseña
               </label>
               <input
                  type="password"
                  id="password_confirmation"
                  name="password_confirmation"
                  required
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('password_confirmation', 'updatePassword') border-red-500 @enderror"
               >
               @error('password_confirmation', 'updatePassword')
               <p class="mt-1 text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8">
               <button type="submit" class="w-full py-2 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                  Cambiar la contraseña
               </button>
            </div>
         </form>
      </div>
   </main>
@endsection

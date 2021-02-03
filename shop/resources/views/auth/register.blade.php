@extends('layouts.simple')

@section('content')
   <main class="min-h-screen flex flex-col justify-center items-center">
      <div class="bg-white p-12 w-2/3 md:w-1/2 xl:w-1/3 rounded-lg shadow">
         <h1 class="text-2xl text-center font-bold mb-12">
            Regístrate como usuario
         </h1>
   
         <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-8">
               <label for="first_name" class="block">
                  Nombre
               </label>
               <input
                  type="text"
                  id="first_name"
                  name="first_name"
                  value="{{ old('first_name') }}"
                  required
                  autofocus
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('first_name') border-red-500 @enderror"
               >
               @error('first_name')
               <p class="text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8">
               <label for="last_name" class="block">
                  Apellido
               </label>
               <input
                  type="text"
                  id="last_name"
                  name="last_name"
                  value="{{ old('last_name') }}"
                  required
                  class="w-full py-2 px-4 text-lg border border-gray-300 rounded-lg shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50
                  @error('last_name') border-red-500 @enderror"
               >
               @error('last_name')
               <p class="text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

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

            <div class="mb-8">
               <label for="password_confirmation" class="block">
                  Confirma tu contraseña
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
               <p class="text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="flex justify-center items-center space-x-1 mb-8">
               <label for="profile_photo" class="w-24 h-24 p-6 inline-block text-center border border-gray-300 rounded-lg cursor-pointer shadow-sm transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50 @error('profile_photo') border-red-500 @enderror">
                  Foto
                  <svg xmlns="http://www.w3.org/2000/svg" height="32" viewBox="0 0 24 24" width="32" class="inline-block">
                     <path d="M0 0h24v24H0z" fill="none"/><path d="M20 6h-8l-2-2H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 12H4V8h16v10z"/>
                  </svg>
               </label>
               <input
                  type="file"
                  id="profile_photo"
                  name="profile_photo"
                  class="w-0"
               >
               <img
                  src="{{ asset('avatars/generic_female.png') }}"
                  alt="Foto del usuario"
                  id="user_profile_photo"
                  class="w-24 h-24 border border-gray-300 rounded-lg inline-block"
               >
               @error('profile_photo')
               <p class="text-sm text-red-500">
                  {{ $message }}
               </p>
               @enderror
            </div>

            <div class="mb-8">
               <button type="submit" class="w-full py-2 bg-orange-600 hover:bg-orange-500 text-white rounded-lg cursor-pointer transition duration-200 focus:outline-none focus:ring focus:ring-orange-500 focus:ring-opacity-50">
                  Registrarme
               </button>
            </div>

            <div>
               Ya tienes una cuenta?
               <a href="{{ route('login') }}" class="text-orange-600 hover:text-orange-500 transition duration-200">
                  Inicia sesión aquí
               </a>
            </div>
         </form>
      </div>
   </main>
@endsection

@push('scripts')
   <script>
      (function showSelectedPhoto()
      {
         const file = document.querySelector('#profile_photo')
         const image = document.querySelector('#user_profile_photo')
         const reader = new FileReader()

         reader.addEventListener(
            'load',
            () => {
               image.src = reader.result
            }
         )

         file.addEventListener(
            'change',
            () => reader.readAsDataURL(file.files[0])
         )
      })()
   </script>
@endpush

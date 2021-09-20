<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
   <title>{{ config('app.name') }}</title>

   <script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   @livewireStyles
</head>
<body>
   <main class="flex">
      <aside class="h-screen w-60 bg-blue-800 p-6 flex-grow-0 flex-shrink-0">
         <img src="{{ asset('img/site/logo.png') }}"
            alt="Logo DecidInfo"
            class="w-36 mx-auto shadow"
         >
         <h3 class="my-6 font-bold text-xl text-white text-center">
            Panel de control
         </h3>

         <p class="text-sm text-blue-400 mb-1 cursor-default">
            ENCUESTAS
         </p>
         <ul>
            <li class="text-white mb-1 py-1 pl-4 cursor-pointer duration-200 {{ request()->routeIs('surveys.index') ? 'bg-blue-700' : 'hover:bg-blue-600' }}">
               <a href="{{ route('surveys.index') }}">
                  <i class="fas fa-home w-6 text-blue-300"></i>
                  Índice
               </a>
            </li>
            <li class="text-white mb-1 py-1 pl-4 cursor-pointer duration-200 {{ request()->routeIs('surveys.main') || request()->routeIs('surveys.section') ? 'bg-blue-700' : 'hover:bg-blue-600' }}">
               <a href="{{ route('surveys.create') }}">
                  <i class="fas fa-poll-h w-6 text-blue-300"></i>
                  Nueva
               </a>
            </li>
         </ul>

         <p class="text-sm text-blue-400 mt-4 mb-1 cursor-default">
            SESIÓN
         </p>
         <ul>
            <li class="text-white mb-1 py-1 pl-4 cursor-pointer duration-200 hover:bg-blue-600">
               <a href="#">
                  <i class="fas fa-user w-6 text-blue-300"></i>
                  Hola, {{ auth()->user()->first_name }}
               </a>
            </li>
            <li class="text-white mb-1 py-1 pl-4 cursor-pointer duration-200 hover:bg-blue-600">
               <a href="" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">
                  <i class="fas fa-sign-out-alt w-6 text-blue-300"></i>
                  Cerrar Sesión
               </a>
            </li>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
               @csrf
            </form>
         </ul>
      </aside>

      <section class="h-screen flex-grow overflow-auto">
         <div class="p-8">
            @yield('content')
         </div>
      </section>
   </main>

   @stack('scripts')
   @livewireScripts
</body>
</html>
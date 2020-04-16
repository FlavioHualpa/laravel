<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <title>{{ config('app.name', 'Laravel') }}</title>
   
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
   
   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   <div id="app">
      <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm">
         <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
               {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
               <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="{{ route('home') }}">
                        Inicio
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">
                        Conexiones
                     </a>
                  </li>
               </ul>

               @auth
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <span class="navbar-text">
                           {{ auth()->user()->name }}
                        </span>
                     </li>
                     <li class="nav-item">
                        <form action="{{ url('/logout') }}" method="post" id="logout_form">
                           @csrf
                           <a href="#" class="nav-link" onclick="event.preventDefault(); const form=document.querySelector('#logout_form'); form.submit();">
                              Cerrar Sesión
                           </a>
                        </form>
                     </li>
                  </ul>
               @endauth
            </div>
         </div>
      </nav>
      
      <main class="py-4">
         @yield('content')
      </main>
   </div>
</body>
</html>

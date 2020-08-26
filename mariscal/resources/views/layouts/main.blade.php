<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="mariscal,ajmechet,escolar,afiche,cartulina,crepe,seda,araña,lunares">
   
   <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
   <link rel="apple-touch-icon" href="{{ asset('favicon.ico') }}">
   
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <title>{{ config('app.title', 'Mariscal') }}</title>
   
   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
   
   <!-- Styles -->
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   
   <!-- Font Awesome CSS -->
   <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
   
   <!-- dl Icon CSS -->
   <link rel="stylesheet" href="{{ asset('css/dl-icon.css') }}">
   
   <!-- All Plugins CSS css -->
   <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
   
   <!-- Revoulation Slider CSS  -->
   <link rel="stylesheet" href="{{ asset('css/revoulation.css') }}">
   
   <!-- jQuery Toast CSS  -->
   <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">
   
   <!-- style css -->
   <link rel="stylesheet" href="{{ asset('css/main.css') }}">
   
   <!-- Scripts -->
   <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
   <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body>
   
   <div class="ai-preloader active">
      <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
         <div class="ai-child ai-bounce1"></div>
         <div class="ai-child ai-bounce2"></div>
         <div class="ai-child ai-bounce3"></div>
      </div>
   </div>
   
   <!-- Main Wrapper Start -->
   <div class="wrapper">
   
      @include('layouts.partials.desktop-header')
      
      @include('layouts.partials.mobile-header')

      @yield('content')

      @include('layouts.partials.footer')
      
      <!-- Search from Start -->
      <div class="searchform__popup" id="searchForm">
         <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
         <div class="searchform__body">
            <p>Buscar productos</p>
            <form class="searchform">
               <input type="text" name="search" id="search" class="searchform__input" placeholder="Por color o categoría...">
               <button type="submit" class="searchform__submit">
                  <i class="dl-icon-search10"></i>
               </button>
            </form>
         </div>
      </div>
      <!-- Search from End -->
      
      <!-- Global Overlay Start -->
      <div class="ai-global-overlay"></div>
      <!-- Global Overlay End -->
   
   </div>
   <!-- Main Wrapper End -->
   
   <!-- ************************* JS Files ************************* -->
   
   <!-- jQuery JS -->
   <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>
   
   <!-- jQuery Toast JS -->
   <script src="{{ asset('js/jquery.toast.min.js') }}"></script>
   
   <!-- Axios -->
   <script src="{{ asset('js/axios.min.js') }}"></script>
   
   <!-- Bootstrap and Popper Bundle JS -->
   <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
   
   <!-- All Plugins Js -->
   <script src="{{ asset('js/plugins.js') }}"></script>
   
   <!-- Ajax Mail Js -->
   <script src="{{ asset('js/ajax-mail.js') }}"></script>
   
   <!-- Main JS -->
   <script src="{{ asset('js/main.js') }}"></script>

   <!-- Search Box -->
   <script src="{{ asset('js/busqueda.js') }}"></script>

   <!-- Custom JS -->
   @stack('customjs')
   
   <!-- REVOLUTION JS FILES -->
   <script src="{{ asset('js/revoulation/jquery.themepunch.tools.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/jquery.themepunch.revolution.min.js') }}"></script>    
   
   <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.actions.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.carousel.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.kenburn.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.layeranimation.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.migration.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.navigation.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.parallax.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.slideanims.min.js') }}"></script>
   <script src="{{ asset('js/revoulation/extensions/revolution.extension.video.min.js') }}"></script>
   
   <!-- REVOLUTION ACTIVE JS FILES -->
   <script src="{{ asset('js/revoulation.js') }}"></script>
   
</body>
</html>

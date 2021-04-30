<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
</head>

<body class="bg-gray-100">

   @yield('header')
   @yield('content')

   @stack('scripts')

</body>
</html>
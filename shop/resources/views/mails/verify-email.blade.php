<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="http://nestorzadoff.com.ar/css/app.css" rel="stylesheet">
   <title>Verifica tu dirección de correo electrónico</title>
</head>
<body class="bg-gray-200">
   <main class="container mx-auto">
      <div class="my-3">
         <img src="{{ asset('img/site/shopping-cart.png') }}" alt="Shop" class="w-20 mx-auto">
      </div>
      <div class="w-1/2 my-3 mx-auto p-8 bg-white">
         <h1 class="text-2xl font-bold">
            Estimado {{ $user->first_name }}
         </h1>
         <h2 class="text-lg">
            <span class="text-gray-600">
               Gracias por registrate en
            </span>
            <span class="text-teal-600">
               Shop
            </span>
         </h2>

         <p class="mt-6">
            Para completar tu registro necesitamos que nos confirmes que esta es tu casilla de correo. Para hacerlo por favor toca el siguiente botón.
         </p>

         <div class="text-center">
            <a href="{{ $verifyLink }}" class="my-6 py-2 px-6 bg-gray-700 text-white rounded hover:bg-gray-600 transition duration-200 inline-block">
               Confirmar mi dirección de correo
            </a>
         </div>

         <hr>

         <p class="mt-6 text-sm text-gray-500">
            Si el botón de arriba no te lleva a la página de confirmación de correo, copia el siguiente link en la barra de direcciones de tu navegador: {{ $verifyLink }}
         </p>
      </div>
   </main>
</body>
</html>

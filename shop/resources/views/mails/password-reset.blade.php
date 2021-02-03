<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <title>Solicitud de cambio de contraseña</title>
</head>
<body class="bg-gray-200">
   <main class="container mx-auto">
      <div class="my-3">
         <img src="{{ asset('img/site/shopping-cart.png') }}" alt="Shop" class="w-20 mx-auto">
      </div>
      <div class="w-1/2 my-3 mx-auto p-8 bg-white">
         <h1 class="text-2xl font-bold">
            Hola {{ $user->first_name }}
         </h1>

         <p class="mt-6">
            Recibes este correo electrónico porque solicitaste el cambio de tu contraseña. Para hacerlo por favor toca el enlace de más abajo.
         </p>

         <p class="mt-6">
            Si no solicitaste el cambio de tu contraseña entonces desestima este correo. Tu contraseña seguirá siendo la misma.
         </p>

         <div class="text-center">
            <a href="{{ route('password.reset', [ $token, 'email' => $user->email ]) }}" class="my-6 py-2 px-6 bg-gray-700 text-white rounded hover:bg-gray-600 transition duration-200 inline-block">
               Cambiar mi contraseña
            </a>
         </div>

         <hr>

         <p class="mt-6 text-sm text-gray-500">
            Si el botón de arriba no te lleva a la página de cambio de contraseña, pega el siguiente link en la barra de direcciones de tu navegador: {{ route('password.reset', [ $token, 'email' => $user->email ]) }}
         </p>
      </div>
   </main>
</body>
</html>

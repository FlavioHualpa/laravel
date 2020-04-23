<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <title>Un usuario de Tweet te ha invitado a seguirlo</title>
   
   <!-- Fonts -->
   <link rel="dns-prefetch" href="//fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
   <!-- Styles -->
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
   <div class="container">
      <div class="card mt-4" style="width: 50rem;">
         <div class="card-body">
            <h2 class="card-title mb-5">
               Tweet
            </h2>
            <h4 class="card-subtitle mb-2 text-muted">
               Hola {{ $invited_name }}, {{ $inviter->name }} te ha invitado a seguirla/o
            </h4>
            <h5 class="card-text mb-3">
               Haz clic en el botón de abajo para empezar recibir sus tweets
            </h5>
            <form action="{{ route('follow', $inviter->username) }}" method="post">
               <button type="submit" class="btn btn-primary btn-lg">
                  Sigue a {{ $inviter->name }}
               </button>
            </form>
         </div>
      </div>
   </div>
</body>
</html>

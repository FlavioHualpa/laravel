<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nuevo Pedido #{{ $pedido->numero }}</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Roboto, sans-serif;
    }

    body {
      background-color: #c0c0c0;
    }

    .page {
      background-color: #e0e0e0;
      width: 800px;
      margin: 20px auto;
      border: 1px solid #d0d0d0;
    }

    .container {
      background-color: #fff;
      width: 600px;
      margin: 20px auto;
      padding: 40px 80px;
      border: 1px solid #d0d0d0;
      border-radius: 4px;
    }

    .container header {
      text-align: right;
    }

    .container header img {
      width: 140px;
    }

    .container .titulo {
      margin-top: 10px;
      padding: 10px 0;
      border-bottom: 1px solid #d0d0d0;
      display: flex;
      justify-content: space-between;
    }

    .container .cuit {
      margin-top: 10px;
      margin-bottom: 30px;
    }

    .container .cuit p {
      line-height: 150%;
    }

    .container .grupo h5 {
       font-family: 'Roboto Slab';
       text-decoration: underline;
       margin-top: 10px;
       margin-bottom: 5px;
       font-size: 14px;
    }

    .container .grupo .cantidad {
       min-width: 40px;
       display: inline-block;
    }

    .container .grupo .cantidad,
    .container .grupo .articulo {
       font-size: 14px;
       line-height: 150%;
    }

    .container .message {
      margin-top: 10px;
      padding: 10px 0;
      border-bottom: 1px solid #d0d0d0;
      font-size: 14px;
    }

    .container .message p {
      margin-bottom: 5px;
    }

    .container footer {
      text-align: center;
      margin-top: 20px;
    }

    .container footer img {
      width: 40px;
    }

    .text-bold {
       font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="page">
    <div class="container">
      <header>
        <img src="{{ asset('img/logo.jpg') }}" alt="Mariscal">
      </header>
      
      <section class="titulo">
        <h3>Pedido #{{ $pedido->numero }}</h3>
        <h3>{{ $pedido->sent_at->format('d/m/Y') }}</h3>
      </section>
      
      <section class="cuit">
         <p>
           {{ $pedido->cliente->razon_social }}
         </p>

         @isset($pedido->domicilio)
            <p>
               Dirección de entrega:
               {{ $pedido->domicilio->domicilio }}
               - {{ $pedido->domicilio->localidad }}
            </p>
         @endisset

         @isset($pedido->transporte)
            <p>
               Transporte:
               {{ $pedido->transporte->nombre }}
            </p>
         @endisset
      </section>
      
      @foreach ($encabezados as $enc)

         <section class="grupo">
            <h5>
               {{ $enc->nombre }}
            </h5>

            @foreach ($pedido->productos()->where('id_niv3', $enc->id)->get() as $prod)
               <span class="cantidad">
                  {{ $prod->detalle->cantidad }}
               </span>
               <span class="articulo">
                  {{ $prod->nombre }}
               </span>
               <br>
            @endforeach

         </section>
      
      @endforeach
      
      <section class="message">
        <p class="text-bold">
           Mensaje:
        </p>
        @isset($pedido->mensaje)
        <p>
           {!! nl2br(e($pedido->mensaje), false) !!}
        </p>
        @else
        <p>
           (no se incluyó un mensaje)
        </p>
        @endisset
        <br>
        <p>
           Iniciado por: {{ $pedido->usuario->razon_social }}
        </p>
        <p>
           Enviado por: {{ $pedido->enviante->razon_social }}
        </p>
      </section>
      
      <footer class="pie">
        <img src="{{ asset('img/m mariscal.jpg') }}" alt="Mariscal">
      </footer>
    </div>
  </div>
</body>
</html>

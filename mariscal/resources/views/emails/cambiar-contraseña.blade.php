<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Solicitud de cambio de contraseña</title>
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

    .container .cuerpo {
       margin-top: 25px;
       font-size: 1em;
       line-height: 140%;
    }

    .container .cuerpo p {
       margin-bottom: 0.5em;
    }

    .container .action {
      margin: 25px auto;
      text-align: center;
    }

    .container .btn {
       background-color: #282828;
       color: white;
       border: none;
       border-radius: 100px;
       text-decoration: none;
       padding: 10px 20px;
    }

    .container .btn:hover {
       background-color: #cf987e;
    }

    .container .footer {
      margin-top: 25px;
      padding: 25px 0;
      font-size: 0.8em;
      line-height: 130%;
      border-top: 1px solid #d0d0d0;
      word-wrap: break-word;
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
        <h3>Cambio de contraseña</h3>
        <h3>{{ now()->format('d/m/Y') }}</h3>
      </section>
      
      <section class="cuerpo">
         <p>
            Hola {{ $user->razon_social }}, te enviamos este email porque solicitaste el cambio de tu contraseña para tu usuario en mariscal.com.ar.
         </p>
         <p>
            Por favor hacé clic en el botón de abajo para ingresar tu nueva contraseña. Tené en cuenta que este link es válido por una hora desde que solicitaste el cambio de tu contraseña. Si ya pasó más de una hora entonces por favor solicitá el cambio nuevamente en nuestra web.
         </p>
         <div class="action">
            <a href="{{ url($link) }}" class="btn">
               Cambiar mi contraseña
            </a>
         </div>
         <p>
            Si no solicitaste el cambio de tu contraseña entonces desestimá este mensaje.
         </p>
         <p>
            Saluda atte.
            <br>
            S. Ajmechet e Hijos - Mariscal
         </p>
      </section>
   
      <section class="footer">
         Si tenés problemas para acceder al cambio de tu contraseña con el botón de arriba copiá el siguiente enlace y pegalo en la barra de direcciones de tu navegador: {{ url($link) }}
      </section>

    </div>
  </div>
</body>
</html>

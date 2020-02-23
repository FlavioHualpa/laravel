<!DOCTYPE html>
<html lang="es">
  <head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('partials.styles')
  </head>
  <body>

    @include('partials.navbar')

		<div class="hero-wrap" style="background-image: url({{ asset('img/bg_3.jpg') }});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Reservas</span></p>
	            <h1 class="mb-4 bread">Gracias!</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-menu bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">

          <h4 class="mt-5">Tu reserva está confirmada, {{ $user->fullName() }}.</h4>
          <h4 class="mt-2">Te hemos enviado un email con los detalles</h4>
          <h4 class="mt-2">de tu reserva y tu factura en formato digital.</h4>
          <h4 class="mt-2">Disfruta de tu estadía, te esperamos.</h4>

          <a href="{{ route('home') }}" class="btn btn-success">Ir al inicio</a>

          </div>
        </div>
			</div>
		</section>

    @include('partials.footer')
    
    @include('partials.loader')

    @include('partials.scripts')
    
  </body>
</html>

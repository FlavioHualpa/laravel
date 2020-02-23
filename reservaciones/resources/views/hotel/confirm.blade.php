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
	            <h1 class="mb-4 bread">Su reserva</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-menu bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">

            @include('partials.' . $status)

          </div>
        </div>
			</div>
		</section>

    @include('partials.footer')
    
    @include('partials.loader')

    @include('partials.scripts')
    <script src="{{ asset('js/custom/reserve.js') }}"></script>
    
  </body>
</html>

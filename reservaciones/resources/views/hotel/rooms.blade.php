<!DOCTYPE html>
<html lang="es">
  <head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @include('partials/styles')
  </head>
  <body>

    @include('partials/navbar')

		<div class="hero-wrap" style="background-image: url({{ asset('img/bg_3.jpg') }});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span> <span>Restaurant</span></p>
	            <h1 class="mb-4 bread">Habitaciones</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    @include('partials/rooms')

    @include('partials/footer')    
  
    @include('partials/loader')

    @include('partials/scripts')
  </body>
</html>

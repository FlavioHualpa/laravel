<!DOCTYPE html>
<html lang="es">
  <head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @include('partials/styles')
    <link rel="stylesheet" href="{{ asset('css/reserv.css') }}">
  </head>
  <body>

    @include('partials/navbar')

		<div class="hero-wrap" style="background-image: url({{ asset('img/bg_3.jpg') }});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Reservas</span></p>
	            <h1 class="mb-4 bread">Tus reservas, {{ $user->first_name }}</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-room pt-0">
    	<div class="container-fluid px-0">
        <div class="chart-frame">

          <div class="row list">
            <div class="col-3 text-center">
              <h4>
                Habitación
              </h4>
            </div>
            <div class="col-3 text-center">
              <h4>
                Fechas
              </h4>
            </div>
            <div class="col-3 text-center">
              <h4>
                Importe
              </h4>
            </div>
            <div class="col-3 text-center">
              <h4>
                Factura
              </h4>
            </div>
          </div>

          @foreach ($rooms as $room)
            <div class="row list">
              <div class="col-3 text-center">
                <big>
                  {{ $room->roomType->name }}
                  <br>
                  Nº {{ $room->roomNumber() }}
                </big>
              </div>
              <div class="col-3 text-center">
                <big>
                  Check In: {{ App\ReservationDataFormatter::checkIn($room) }}
                  <br>
                  Check Out: {{ App\ReservationDataFormatter::checkOut($room) }}
                </big>
              </div>
              <div class="col-3 text-center">
                <big>
                  {{ App\ReservationDataFormatter::totalPrice($room) }}
                </big>
              </div>
              <div class="col-3 text-center">
                <big>
                  <a href="{{ App\ReservationDataFormatter::invoiceUrl($room) }}" download class="btn btn-success">
                    Descargar PDF
                  </a>
                </big>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </section>

    @include('partials/footer')    
  
    @include('partials/loader')

    @include('partials/scripts')
  </body>
</html>

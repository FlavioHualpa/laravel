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
	            <h1 class="mb-4 bread">Reservas por Habitación</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-room pt-0">
    	<div class="container-fluid px-0">
        <div class="chart-frame">

          <div class="row list">
            <div class="col-2 text-center">
              <h4>
                Habitación
              </h4>
            </div>
            <div class="col-10 text-center">
              <h4>
                Reservas entre el 1.12.19 y el 29.2.20
              </h4>
            </div>
          </div>

          @foreach ($rooms as $room)
          @php
            $firstDay = $startingDate;
            $color = $colors[$loop->iteration % 8];
          @endphp

          <div class="row list">
            <div class="col-2 text-center">
              <h5>
                {{ $room->roomNumber() }}
              </h5>
            </div>
            <div class="d-flex col-10">
              @foreach ($room->reservations()->wherePivot('check_in', '>=', '2019-12-01')->wherePivot('check_out', '<=', '2020-02-29')->orderBy('check_in')->get() as $user)
              @php
                  $checkIn = Carbon\Carbon::make($user->pivot->check_in);
                  $checkOut = Carbon\Carbon::make($user->pivot->check_out);
                  $days = $checkIn->diffInDays($firstDay);
                  $spaceWidth = $days * 100 / 92;
                  $days = $checkOut->diffInDays($checkIn);
                  $reservWidth = $days * 100 / 92;
                  $firstDay = $checkOut;
              @endphp

              <span class="bar" style="width: {{$spaceWidth}}%;"></span>
              <span class="bar hover" style="background-color: var({{$color}}); width: {{$reservWidth}}%;" title="{{$user->fullName()}} del {{$checkIn->format('d-m-Y')}} al {{$checkOut->format('d-m-Y')}}"></span>

              @endforeach
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

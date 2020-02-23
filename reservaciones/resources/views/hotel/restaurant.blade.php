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
	            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Restaurant</span></p>
	            <h1 class="mb-4 bread">Restaurant</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
      			<div class="single-slider-resto mb-4 mb-md-0 owl-carousel">
      				<div class="item">
      					<div class="resto-img rounded" style="background-image: url({{ asset('img/rooms/room-4.jpg') }});"></div>
      				</div>
      				<div class="item">
      					<div class="resto-img rounded" style="background-image: url({{ asset('img/rooms/room-5.jpg') }});"></div>
      				</div>
      				<div class="item">
      					<div class="resto-img rounded" style="background-image: url({{ asset('img/rooms/room-6.jpg') }});"></div>
      				</div>
      			</div>
    			</div>
    			<div class="col-md-6 pl-md-5">
    				<div class="heading-section mb-4 my-5 my-md-0">
	          	<span class="subheading">Acerca del Hotel Harbor Lights</span>
	            <h2 class="mb-4">Restaurante del Hotel Harbor Lights</h2>
	          </div>
	          <p>En un lugar lejano, detrás de la palabra montañas, lejos de los paises de Vokalia y Consonantia, allí viven los textos ciegos. Separados ellos viven en Bookmarksgrove, justo sobre la costa de la Semántica, un enorme océano del lenguaje.</p>
	          <p>Un pequeño río llamado Duden fluye por su lugar y le suministra los regelialia necesarios. Es un país paradisíaco, en el que las partes asadas de las frases vuelan en tu boca.</p>
	          <p><a href="#" class="btn btn-secondary rounded">Más información</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-menu bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Menú del Restaurant</span>
            <h2>Nuestras Especialidades</h2>
          </div>
        </div>
				<div class="row">
          @foreach ($menus as $menu)
        	<div class="col-lg-6 col-xl-6 d-flex">
        		<div class="pricing-entry rounded d-flex ftco-animate">
              <div class="img" style="background-image: url({{ asset($menu->image->url) }});">
              </div>
        			<div class="desc p-4">
	        			<div class="d-md-flex text align-items-start">
	        				<h3>
                    <span>
                      {{ $menu->name }}
                    </span>
                  </h3>
	        				<span class="price">
                    {{ $menu->formattedPrice() }}
                  </span>
	        			</div>
	        			<div class="d-block">
	        				<p>
                    {{ $menu->description }}
                  </p>
	        			</div>
        			</div>
        		</div>
          </div>
          @endforeach
        </div>
			</div>
		</section>

    @include('partials.footer')
    
    @include('partials.loader')

    @include('partials.scripts')
    
  </body>
</html>

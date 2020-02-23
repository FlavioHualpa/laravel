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

		<div class="hero">
	    <section class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image:url({{ asset('img/bg_1.jpg') }});">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-end">
	          <div class="col-md-6 ftco-animate">
	          	<div class="text">
	          		<h2>Tu mejor sitio para hacer reservaciones</h2>
		            <h1 class="mb-3">Hotel para toda la familia, todo el año</h1>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:url({{ asset('img/bg_2.jpg') }});">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row no-gutters slider-text align-items-center justify-content-end">
	          <div class="col-md-6 ftco-animate">
	          	<div class="text">
	          		<h2>Hotel &amp; Resort Harbor Lights</h2>
		            <h1 class="mb-3">Es como estar en tu propia casa</h1>
	            </div>
	          </div>
	        </div>
	        </div>
	      </div>
	    </section>
	  </div>

		@include('partials.room-selector')

		<section class="ftco-section">
      <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Bienvenido al Hotel Harbor Lights</span>
            <h2 class="mb-4">No querrá dejarnos</h2>
          </div>
        </div>  
        <div class="row d-flex">
          <div class="col-md pr-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-reception-bell"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Servicio cordial</h3>
              </div>
            </div>      
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services active py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-serving-dish"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Desayune</h3>
              </div>
            </div>    
          </div>
          <div class="col-md px-md-1 d-flex align-sel Searchf-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-car"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Servicios de traslado</h3>
              </div>
            </div>      
          </div>
          <div class="col-md px-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-spa"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Suits &amp; SPA</h3>
              </div>
            </div>      
          </div>
          <div class="col-md pl-md-1 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="ion-ios-bed"></span>
              	</div>
              </div>
              <div class="media-body">
                <h3 class="heading mb-3">Habitaciones comfortables</h3>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-wrap-about ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-7 order-md-last d-flex">
						<div class="img img-1 mr-md-2 ftco-animate" style="background-image: url({{ asset('img/about-1.jpg') }});"></div>
						<div class="img img-2 ml-md-2 ftco-animate" style="background-image: url({{ asset('img/about-2.jpg') }});"></div>
					</div>
					<div class="col-md-5 wrap-about pb-md-3 ftco-animate pr-md-5 pb-md-5 pt-md-4">
	          <div class="heading-section mb-4 my-5 my-md-0">
	          	<span class="subheading">Acerca de Harbor Lights</span>
	            <h2 class="mb-4">Hotel Harbor Lights, el más recomendado en todo el mundo</h2>
	          </div>
	          <p>En un lugar lejano, detrás de la palabra montañas, lejos de los paises de Vokalia y Consonantia, allí viven los textos ciegos. Separados ellos viven en Bookmarksgrove, justo sobre la costa de la Semántica, un enorme océano del lenguaje.</p>
	          <p><a href="#" class="btn btn-secondary rounded">Reserve su habitación ahora</a></p>
					</div>
				</div>
			</div>
		</section>

    <section class="testimony-section">
      <div class="container">
        <div class="row no-gutters ftco-animate justify-content-center">
        	<div class="col-md-5 d-flex">
        		<div class="testimony-img aside-stretch-2" style="background-image: url({{ asset('img/testimony-img.jpg') }});"></div>
        	</div>
          <div class="col-md-7 py-5 pl-md-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate mb-4">
	          		<span class="subheading">Testimonio</span>
			          <h2 class="mb-0">Cliente satisfecho</h2>
			        </div>
	            <div class="carousel-testimony owl-carousel ftco-animate">

								@foreach ($testimonies as $testimony)
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">
												{{ $testimony->body }}
											</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url({{ asset($testimony->user->image->url) }})">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">
													{{ $testimony->user->fullName() }}
												</p>
		                    <span class="position">
													{{ $testimony->user->job->name }}
												</span>
		                  </div>
		                </div>
	                </div>
								</div>
								@endforeach

	            </div>
	          </div>
          </div>
        </div>
      </div>
    </section>

		{{-- Las habitaciones del hotel --}}

		@include('partials/rooms')

		{{-- El Menú del Restaurant --}}

		<section class="ftco-section ftco-menu bg-light">

			<div class="container-fluid px-md-4">

				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Restaurant</span>
            <h2>Deléitese con nuestro increíble menú</h2>
          </div>
				</div>
				
				<div class="row">
				
					@foreach ($menus as $menu)

        	<div class="col-lg-6 col-xl-4 d-flex">
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

        	<div class="col-md-12 text-center ftco-animate">
        		<p><a href="{{ route('hotel.restaurant') }}" class="btn btn-primary rounded">Consulte todo nuestro menú</a></p>
					</div>
					
				</div>
				
			</div>

		</section>

		{{--
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Read Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url({{ asset('img/image_1.jpg') }});">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">Oct. 30, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url({{ asset('img/image_2.jpg') }});">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">Oct. 30, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20 rounded" style="background-image: url({{ asset('img/image_3.jpg') }});">
              </a>
              <div class="text mt-3 text-center">
              	<div class="meta mb-2">
                  <div><a href="#">Oct. 30, 2019</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="instagram">
      <div class="container-fluid">
        <div class="row no-gutters justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Photos</span>
            <h2><span>Instagram</span></h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-1.jpg" class="insta-img image-popup" style="background-image: url(images/insta-1.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-2.jpg" class="insta-img image-popup" style="background-image: url(images/insta-2.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-3.jpg" class="insta-img image-popup" style="background-image: url(images/insta-3.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-4.jpg" class="insta-img image-popup" style="background-image: url(images/insta-4.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md ftco-animate">
            <a href="images/insta-5.jpg" class="insta-img image-popup" style="background-image: url(images/insta-5.jpg);">
              <div class="icon d-flex justify-content-center">
                <span class="icon-instagram align-self-center"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
		</section>
		--}}

		@include('partials/footer');
		
		@include('partials/loader');
		
		@include('partials/scripts');
    
  </body>
</html>

    <section class="ftco-section ftco-no-pb ftco-room">

    	<div class="container-fluid px-0">
    		<div class="row no-gutters justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Habitaciones del Harbor Lights</span>
            <h2 class="mb-4">Habitaciones principales</h2>
          </div>
				</div>
				
    		<div class="row no-gutters">

					@foreach ($roomTypes as $roomType)
					@php
					$isOddRow = ($loop->index / 2) % 2 == 0;
					@endphp

    			<div class="col-lg-6">
    				<div class="room-wrap d-md-flex ftco-animate">

							@if ($isOddRow)
							<a href="{{ route('hotel.room-detail', $roomType->id) }}" class="img" style="background-image: url({{ asset($roomType->image->url) }});">
							</a>
							@endif

    					<div class="half {{ $isOddRow ? 'left-arrow' : 'right-arrow' }} d-flex align-items-center">
    						<div class="text p-4 text-center">
    							<p class="star mb-0">
										@for ($i = 0; $i < $roomType->stars; $i++)
										<span class="ion-ios-star"></span>
										@endfor
									</p>
    							<p class="mb-0">
										<span class="price mr-1">
											{{ $roomType->formattedPrice() }}
										</span>
										<span class="per">
											por noche
										</span>
									</p>
	    						<h3>
										<a href="{{ route('hotel.room-detail', $roomType->id) }}">
											{{ $roomType->name }}
										</a>
									</h3>
									<h5 class="mb-3">
										máximo {{ $roomType->passengers }} pasajeros
									</h5>
	    						<p class="pt-1">
										<a href="{{ route('hotel.room-detail', $roomType->id) }}" class="btn-custom px-3 py-2 rounded">
											Detalles <span class="icon-long-arrow-right"></span>
										</a>
										<a href="{{ route('hotel.room-detail', $roomType->id) }}" class="btn-custom px-3 py-2 rounded">
											Ver disponibilidad <span class="icon-long-arrow-right"></span>
										</a>
									</p>
    						</div>
							</div>
							
							@unless ($isOddRow)
							<a href="{{ route('hotel.room-detail', $roomType->id) }}" class="img" style="background-image: url({{ asset($roomType->image->url) }});">
							</a>
							@endunless

    				</div>
					</div>

					@endforeach
					
    		</div>
    	</div>
    </section>

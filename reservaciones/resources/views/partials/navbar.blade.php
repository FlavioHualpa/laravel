    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ route('home') }}">Reservaciones</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{ route('hotel.rooms') }}" class="nav-link">Nuestras habitaciones</a></li>
	          <li class="nav-item"><a href="{{ route('hotel.restaurant') }}" class="nav-link">Restaurant</a></li>
	          <li class="nav-item"><a href="{{ route('hotel.about') }}" class="nav-link">Sobre nosotros</a></li>
	          <li class="nav-item"><a href="{{ route('hotel.blog') }}" class="nav-link">Blog</a></li>
						<li class="nav-item"><a href="{{ route('hotel.contact') }}" class="nav-link">Contacto</a></li>
						
						@auth
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{ auth()->user()->first_name }}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item" href="{{ route('user.reservations') }}">
										Tus reservas
									</a>
									<div class="dropdown-divider">
									</div>
									<a class="dropdown-item" href="#" onclick="event.preventDefault(); document.querySelector('#logout_form').submit();">
										Cerrar sesión
									</a>
								</div>
							</li>
						@else
							<li class="nav-item">
								<a href="{{ route('login') }}" class="nav-link">
									Iniciar sesión
								</a>
							</li>
						@endauth
					
						<form action="{{ route('logout') }}" method="post" id="logout_form">
							@csrf
						</form>
					
	        </ul>
	      </div>
	    </div>
	  </nav>

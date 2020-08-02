      <!-- Mobile Header area Start -->
      <header class="header-mobile">
         <div class="header-mobile__outer">
            <div class="header-mobile__inner fixed-header">
               <div class="container-fluid">
                  <div class="row align-items-center">
                     <div class="col-4">
                        <a href="{{ route('home') }}" class="logo-box">
                           <figure class="logo--normal">
                              <img src="{{ asset('img/logo.jpg') }}" alt="logo">
                           </figure>
                        </a>
                     </div>
                     <div class="col-8">
                        <ul class="header-toolbar text-right">
                           <li class="header-toolbar__item user-info-menu-btn">
                              <a href="{{ route('login') }}">
                                 <i class="fa fa-user-circle-o"></i>
                              </a>
                              <ul class="user-info-menu">
                                 @guest
                                 <li>
                                    <a href="{{ route('login') }}">
                                       Ingresar
                                    </a>
                                 </li>
                                 @endguest

                                 @auth
                                 <li>
                                    <a href="#">
                                       {{ auth()->user()->razon_social }}
                                    </a>
                                 </li>

                                 @if (session()->has(config('auth.session_customer_key')))
                                 <li>
                                    <a href="#">
                                       {{ session(config('auth.session_customer_key'))->razon_social }}
                                    </a>
                                 </li>

                                 <li>
                                    <a href="{{ route('select.customer') }}">
                                       Cambiar de cliente
                                    </a>
                                 </li>
                                 @endif

                                 <li>
                                    <a href="{{ route('order.history') }}">
                                       Historial de pedidos
                                    </a>
                                 </li>

                                 <li>
                                    <form action="{{ route('logout') }}" method="post" id="logout_form">
                                       @csrf
                                    </form>
                                    <a href="#" onclick="event.preventDefault(); document.querySelector('#logout_form').submit();">
                                       Salir
                                    </a>
                                 </li>
                                 @endauth
                              </ul>
                           </li>
                           <li class="header-toolbar__item">
                              <a href="{{ route('cart') }}" class="mini-cart-btn{{-- toolbar-btn --}}">
                                 <i class="dl-icon-cart4"></i>
                                 {{-- <sup class="mini-cart-count">2</sup> --}}
                              </a>
                           </li>
                           <li class="header-toolbar__item">
                              <a href="#searchForm" class="search-btn toolbar-btn">
                                 <i class="dl-icon-search1"></i>
                              </a>
                           </li>
                           <li class="header-toolbar__item d-lg-none">
                              <a href="#" class="menu-btn"></a>                 
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12">
                        <!-- Mobile Navigation Start Here -->
                        <div class="mobile-navigation dl-menuwrapper" id="dl-menu">
                           <button class="dl-trigger">Abrir Menu</button>
                           <ul class="dl-menu">

                              @foreach ($itemsNiv1 as $itemNiv1)
                              <li>
                                 <a href="#">
                                    {{ $itemNiv1->nombre }}
                                 </a>
                                 <ul class="dl-submenu">

                                    @foreach ($itemNiv1->publicSubitems as $itemNiv2)
                                    <li>
                                       <a {{-- class="megamenu-title" --}} href="{{ $itemNiv2->url }}">
                                          {{ $itemNiv2->nombre }}
                                       </a>

                                       @if ($itemNiv2->subitems_count)
                                       <ul class="dl-submenu">

                                          @foreach ($itemNiv2->publicSubitems as $itemNiv3)
                                          <li>
                                             <a href="{{ url('productos/' . $itemNiv3->url) }}">
                                                {{ $itemNiv3->nombre }}
                                             </a>
                                          </li>
                                          @endforeach
                                       
                                       </ul>
                                       @endif
                                    
                                    </li>
                                    @endforeach

                                 </ul>
                              </li>
                              @endforeach
                           </ul>
                        </div>
                        <!-- Mobile Navigation End Here -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="mobile-sticky-header-height"></div>
         </div>
      </header>
      <!-- Mobile Header area End -->
      
      <!-- Header Area Start -->
      <header class="header header-fullwidth header-style-3">
         <div class="header-outer">
            <div class="header-inner fixed-header">
               <div class="header-middle">
                  <div class="container-fluid">
                     <div class="row align-items-center">
                        <div class="col-xl-4 col-lg-5 d-lg-block d-none">    
                           <!-- Contact Info Start Here -->
                           <div class="header-contact-info">
                              <div class="header-contact-info__item">
                                 <span>
                                    <i class="fa fa-phone"></i>
                                    Teléfonos
                                 </span>
                                 <span>
                                    <a href="tel:00541148548521">
                                       (+54) 11 4854-8521 / 3901
                                    </a>
                                 </span>
                              </div>
                              <div class="header-contact-info__item">
                                 <span>
                                    <i class="fa fa-whatsapp"></i>
                                    WhatsApp
                                 </span>
                                 <span>
                                    <a href="https://api.whatsapp.com/send?phone=005491128663595&text=Buenos%20días,">
                                       005491128663595
                                    </a>
                                 </span>
                              </div>
                           </div>
                           <!-- Contact Info End Here -->
                        </div>
                        <div class="col-xl-4 col-lg-2 col-4 text-lg-center">
                           <a href="{{ route('home') }}" class="logo-box">
                              <figure class="logo--normal">
                                 <img src="{{ asset('img/logo.jpg') }}" alt="logo">
                              </figure>
                           </a>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-8">
                           <div class="header-middle-right">
                              <div class="searchform-wrapper d-none d-lg-block">
                                 <form action="#" class="searchform searchform-2">
                                    <input type="text" class="searchform__input" id="search2" name="search" placeholder="Buscar...">
                                    {{-- <button type="submit" class="searchform__submit">
                                    </button> --}}
                                 </form>
                                 <div class="results-box">
                                    <ul>
                                    </ul>
                                 </div>
                              </div>
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
                                    <a href="{{ route('cart') }}" class="mini-cart-btn">
                                       <i class="dl-icon-cart4"></i>
                                       {{-- <sup class="mini-cart-count">2</sup> --}}
                                    </a>
                                 </li>
                                 <li class="header-toolbar__item d-lg-none">
                                    <a href="#" class="menu-btn">
                                    </a>                 
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="header-bottom">
                  <div class="container-fluid">
                     <div class="row justify-content-center">
                        <div class="col-12">
                           <!-- Main Navigation Start Here -->
                           <nav class="main-navigation">
                              <ul class="mainmenu mainmenu--2 mainmenu--centered">
                                 
                                 @foreach ($itemsNiv1 as $itemNiv1)
                                 <li class="mainmenu__item menu-item-has-children has-children">
                                    <a href="#" class="mainmenu__link">
                                       <span class="mm-text">
                                          {{ $itemNiv1->nombre }}
                                       </span>
                                    </a>
                                    
                                    <ul class="sub-menu">
                                       
                                       @foreach ($itemNiv1->publicSubitems as $itemNiv2)
                                       <li class="menu-item-has-children has-children">
                                          <a href="#">
                                             <span class="mm-text">
                                                {{ $itemNiv2->nombre}}
                                             </span>
                                          </a>
                                          
                                          <ul class="sub-menu">
                                             
                                             @foreach($itemNiv2->publicSubitems as $itemNiv3)
                                             <li>
                                                <a href="{{ url('productos/' . $itemNiv3->url) }}">
                                                   <span class="mm-text">
                                                      {{ $itemNiv3->nombre }}
                                                   </span>
                                                </a>
                                             </li>
                                             @endforeach
                                             
                                          </ul>
                                       </li>
                                       @endforeach
                                       
                                    </ul>
                                 </li>
                                 @endforeach
                                                                        
                              </ul>
                           </nav>
                        <!-- Main Navigation End Here -->
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="main-sticky-header-height"></div>
         </div>
      </header>
      <!-- Header Area End -->

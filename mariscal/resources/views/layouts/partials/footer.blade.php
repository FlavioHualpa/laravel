      <!-- Footer Start -->
      <footer class="footer footer-4 bg--white border-top">
         <div class="container">

            <div class="row mb--15 mb-sm--20">

               {{-- Columna 1 --}}
               <div class="col-md-4 mb-lg--30">
                  <div class="footer-widget">
                     <a href="{{ route('home') }}" class="footer-logo">
                        <img src="{{ asset('img/logo.jpg') }}" alt="Mariscal">
                     </a>
                  </div>
               </div>

               {{-- Columna 2 --}}
               <div class="col-md-4 mb-lg--30">
                  <div class="footer-widget">
                     <h3 class="widget-title widget-title--2">EMPRESA</h3>
                     <ul class="widget-menu widget-menu--2">

                        @foreach ($linksFooter as $link)
                           <li>
                              <a href="{{ $link->url }}">
                                 {{ $link->titulo }}
                              </a>
                           </li>
                        @endforeach

                     </ul>
                  </div>
               </div>

               {{-- Columna 3 --}}
               <div class="col-md-4 mb-lg--30">
                  <div class="footer-widget">
                     <h3 class="widget-title widget-title--2">SHOPPING</h3>
                     <ul class="widget-menu widget-menu--2">
                        <li><a href="shop-instagram.html">Look Book</a></li>
                        <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                        <li><a href="shop-fullwidth.html">Shop Fullwidth</a></li>
                        <li><a href="shop-no-gutter.html">Man & Woman</a></li>
                     </ul>
                  </div>
               </div>
            </div>

         </div>
      </footer>
      <!-- Footer End -->
      
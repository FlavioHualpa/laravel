         <!-- Banner Area Start Here -->
         <section class="banner-area mb--70 mb-md--50">
            <div class="container-fluid p-0">

               <div class="row mb--40 mb-md--30">
                  <div class="col-12 text-center">
                     <h2 class="heading-secondary">{{ $section->nombre }}</h2>
                     <hr class="separator center mt--25 mt-md--15">
                  </div>
               </div>

               <div class="row no-gutters">

                  @foreach ($section->secciones as $item)
                  <div class="col-md-4">
                     <div class="banner-box banner-type-3 banner-type-3-1 banner-hover-1">
                        <div class="banner-inner">
                           <div class="banner-image">
                              <img src="{{ asset('img/' . $item->imagen . '.jpg') }}" alt="{{ $item->url }}">
                           </div>
                           <div class="banner-info">
                              {{--
                              <p class="banner-title-1 lts-13 lts-lg-4 text-uppercase">New Season</p>
                              <h2 class="banner-title-2">Gift <strong>Box</strong></h2>
                              --}}
                           </div>
                           <a class="banner-link banner-overlay" href="{{ url($item->url) }}">
                              Shop Now
                           </a>
                        </div>
                     </div>
                  </div>
                  @endforeach

               </div>
            </div>
         </section>
         <!-- Banner Area End Here -->

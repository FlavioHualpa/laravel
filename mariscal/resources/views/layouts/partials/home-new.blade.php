         <!-- Product Section Start -->
         <div class="section-wrapper mb--80 mb-md--60">

            <div class="container-fluid">

               <!-- Título Carrousel -->
               <div class="row mb--40 mb-md--30">
                  <div class="col-12 text-center">
                     <h2 class="heading-secondary">{{ $section->nombre }}</h2>
                     <hr class="separator center mt--25 mt-md--15">
                  </div>
               </div>

               <!-- Fila de imágenes -->
               <div class="row">
                  <div class="col-12">
                     <div class="airi-element-carousel dot-style-1 slick-dot-mb-30" data-slick-options='{
                        "spaceBetween": 30,
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "dots": true
                     }' data-slick-responsive='[
                        {"breakpoint": 991, "settings": {"slidesToShow": 3}},
                        {"breakpoint": 767, "settings": {"slidesToShow": 2}},
                        {"breakpoint": 575, "settings": {"slidesToShow": 1}}
                     ]'>

                        <!-- Imágenes -->
                        @foreach ($section->secciones as $item)
                        <div class="item">
                           <div class="airi-product airi-product--2">
                              <div class="product-inner">
                                 <figure class="product-image">
                                    <div class="product-image--holder">
                                       <a href="product-details.html">
                                          <img src="{{ asset('img/' . $item->imagen . '.jpg') }}"
                                             alt="{{ $item->imagen }}" class="primary-image">
                                          <img src="{{ asset('img/' . $item->imagen . '.jpg') }}"
                                             alt="{{ $item->imagen }}" class="secondary-image">
                                       </a>
                                    </div>
                                 </figure>
                                 <div class="product-info">
                                    <h3 class="product-title">
                                       <a href="{{ url($item->url) }}">
                                          {{ $item->titulo1 }}
                                       </a>
                                    </h3>
                                    {{--
                                    <span class="product-price-wrapper">
                                          <span class="money">$49.00</span>
                                    </span>
                                    --}}
                                 </div>
                                 <div class="product-overlay"></div>
                              </div>
                           </div>
                        </div>
                        @endforeach

                     </div>
                  </div>
               </div>
            </div>

         </div>
         <!-- Product Section End -->

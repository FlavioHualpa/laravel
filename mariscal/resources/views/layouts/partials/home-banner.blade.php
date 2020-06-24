         <!-- Slider Area Start Here -->
         <div class="homepage-slider mb--70 mb-md--50">
            <div class="airi-element-carousel nav-vertical-center nav-style-1" data-slick-options='{
               "slidesToShow" : 1,
               "arrows": true,
               "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "fa fa-angle-double-left" },
               "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "fa fa-angle-double-right" }
            }'>

               @foreach ($section->secciones as $item)

                  <div class="item">
                     <div class="single-slide slider-height d-flex align-items-center"
                     style="background-image: url({{ asset('img/' . $item->imagen . '.jpg') }});">
                        <div class="container">
                           <div class="row">
                              <div class="col-12">
                                 <div class="slider-content text-center">
                                    <h1 class="slider-heading heading-color mb--30">
                                       <span class="slider-heading--sub" data-animation="fadeInUp"
                                       data-duration=".4s" data-delay=".7s">
                                          {{ $item->titulo1 }}
                                       </span>
                                       <span class="slider-heading--main" data-animation="fadeInUp"
                                       data-duration=".4s" data-delay="1s">
                                          {{ $item->titulo2 }}
                                       </span>
                                    </h1>
                                    <a href="{{ url($item->url) }}" class="btn btn-style-1" style="background-color: {{ $item->color_boton }}"
                                    data-animation="fadeInUp" data-duration=".4s" data-delay="1.2s">
                                       {{ $item->texto_boton }}
                                       <i class="fa fa-angle-double-right"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               
               @endforeach

            </div>
         </div>
         <!-- Slider Area End Here -->

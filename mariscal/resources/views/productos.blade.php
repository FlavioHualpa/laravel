@extends('layouts.main')

@section('content')

      <!-- Main Content Wrapper Start -->
      <div id="content" class="main-content-wrapper">

         <!-- Breadcrumb area Start -->
         <div class="bg--white-6">
            <div class="row">
               <div class="col-12 text-center">
                  <img src="{{ asset('img/' . $categoria->imagen . '.jpg') }}" alt="{{ $categoria->nombre }}">
               </div>
            </div>
         </div>
         <!-- Breadcrumb area End -->

         <!-- Gallery Wrapper Start -->
         <div id="content" class="main-content-wrapper">
            <div class="shop-page-wrapper">
               <div class="container-fluid">
                  <div class="row shop-fullwidth pt--45 pt-md--35 pt-sm--20 pb--60 pb-md--50 pb-sm--40">
                     <div class="col-12">

                        {{-- Barra de filtro y orden desactivada
                        <div class="shop-toolbar">
                              <div class="shop-toolbar__inner">
                                 <div class="row align-items-center">
                                       <div class="col-md-6 text-md-left text-center mb-sm--20">
                                          <div class="shop-toolbar__left">
                                             <p class="product-pages">Showing 1–20 of 42 results</p>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="shop-toolbar__right">
                                             <a href="#" class="product-filter-btn shop-toolbar__btn">
                                                   <span>Filters</span>
                                                   <i></i>
                                             </a>
                                             <div class="product-ordering">
                                                   <a href="" class="product-ordering__btn shop-toolbar__btn">
                                                      <span>Short By</span>
                                                      <i></i>
                                                   </a>
                                                   <ul class="product-ordering__list">
                                                      <li class="active"><a href="#">Sort by popularity</a></li>
                                                      <li><a href="#">Sort by average rating</a></li>
                                                      <li><a href="#">Sort by newness</a></li>
                                                      <li><a href="#">Sort by price: low to high</a></li>
                                                      <li><a href="#">Sort by price: high to low</a></li>
                                                   </ul>
                                             </div>
                                          </div>
                                       </div>
                                 </div>
                              </div>
                              <div class="advanced-product-filters">
                                 <div class="product-filter">
                                       <div class="row">
                                          <div class="col-md-3">
                                             <div class="product-widget product-widget--price">
                                                   <h3 class="widget-title">Price</h3>
                                                   <ul class="product-widget__list">
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span class="ammount">$20.00</span>
                                                               <span> - </span>
                                                               <span class="ammount">$40.00</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span class="ammount">$40.00</span>
                                                               <span> - </span>
                                                               <span class="ammount">$50.00</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span class="ammount">$50.00</span>
                                                               <span> - </span>
                                                               <span class="ammount">$60.00</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span class="ammount">$60.00</span>
                                                               <span> - </span>
                                                               <span class="ammount">$80.00</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span class="ammount">$80.00</span>
                                                               <span> - </span>
                                                               <span class="ammount">$100.00</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span class="ammount">$100.00</span>
                                                               <span> + </span>
                                                         </a>
                                                      </li>
                                                   </ul>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="product-widget product-widget--brand">
                                                   <h3 class="widget-title">Brands</h3>
                                                   <ul class="product-widget__list">
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>Airi</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>Mango</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>Valention</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>Zara</span>
                                                         </a>
                                                      </li>
                                                   </ul>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="product-widget product-widget--color">
                                                   <h3 class="widget-title">Color</h3>
                                                   <ul class="product-widget__list product-color-swatch">
                                                      <li>
                                                         <a href="shop-sidebar.html"
                                                               class="product-color-swatch-btn blue">
                                                               <span class="product-color-swatch-label">Blue</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html"
                                                               class="product-color-swatch-btn green">
                                                               <span class="product-color-swatch-label">Green</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html"
                                                               class="product-color-swatch-btn pink">
                                                               <span class="product-color-swatch-label">Pink</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html"
                                                               class="product-color-swatch-btn red">
                                                               <span class="product-color-swatch-label">Red</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html"
                                                               class="product-color-swatch-btn grey">
                                                               <span class="product-color-swatch-label">Grey</span>
                                                         </a>
                                                      </li>
                                                   </ul>
                                             </div>
                                          </div>
                                          <div class="col-md-3">
                                             <div class="product-widget product-widget--size">
                                                   <h3 class="widget-title">Size</h3>
                                                   <ul class="product-widget__list">
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>L</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>M</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>S</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>XL</span>
                                                         </a>
                                                      </li>
                                                      <li>
                                                         <a href="shop-sidebar.html">
                                                               <span>XXL</span>
                                                         </a>
                                                      </li>
                                                   </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <a href="#" class="btn-close"><i class="dl-icon-close"></i></a>
                                 </div>
                              </div>
                        </div>
                        --}}

                        <div class="shop-products">
                           <div class="row grid-space-20 xxl-block-grid-5">

                              {{-- Bucle de productos --}}
                              @foreach ($categoria->publicSubitems as $item)
                                    
                              <div class="col-lg-3 col-sm-6 mb--40 mb-md--30">

                                 <div class="airi-product">
                                    <div class="product-inner">
                                       <figure class="product-image">
                                          <div class="product-image--holder">
                                             <a href="product-details.html">
                                                <img src="{{ $item->urlImagen }}" alt="{{ $item->nombre }}" class="primary-image">
                                                <img src="{{ $item->urlImagen }}" alt="{{ $item->nombre }}" class="secondary-image">
                                             </a>
                                          </div>

                                          {{-- Acciones deslizantes desactivadas
                                          <div class="airi-product-action">
                                             <div class="product-action">
                                                <a class="quickview-btn action-btn" data-toggle="tooltip"
                                                      data-placement="top" title="Quick Shop">
                                                      <span data-toggle="modal" data-target="#productModal">
                                                         <i class="dl-icon-view"></i>
                                                      </span>
                                                </a>
                                                <a class="add_to_cart_btn action-btn" href="cart.html"
                                                      data-toggle="tooltip" data-placement="top"
                                                      title="Add to Cart">
                                                      <i class="dl-icon-cart29"></i>
                                                </a>
                                                <a class="add_wishlist action-btn" href="wishlist.html"
                                                      data-toggle="tooltip" data-placement="top"
                                                      title="Add to Wishlist">
                                                      <i class="dl-icon-heart4"></i>
                                                </a>
                                                <a class="add_compare action-btn" href="compare.html"
                                                      data-toggle="tooltip" data-placement="top"
                                                      title="Add to Compare">
                                                      <i class="dl-icon-compare"></i>
                                                </a>
                                             </div>
                                          </div>
                                          --}}
                                       </figure>

                                       <div class="quantity">
                                          <input type="number" class="quantity-input" name="qty" id="quick-qty" value="0" min="0" step="{{ $item->multiplo }}">
                                          {{--
                                          <div class="dec qtybutton">-</div>
                                          <div class="inc qtybutton">+</div>
                                          --}}
                                       </div>

                                       <div class="product-info">
                                          <p class="product-title-2">
                                             <a href="#">
                                                {{ $item->nombre }}
                                             </a>
                                          </p>
                                       </div>
                                    </div>
                                 </div>
                              
                              </div>
                              @endforeach
                              {{-- Fin del bucle de productos --}}

                           </div>
                        </div>

                        {{-- Barra de paginado desactivada
                        <nav class="pagination-wrap">
                           <ul class="pagination">
                              <li><a href="#" class="prev page-number"><i class="fa fa-angle-double-left"></i></a>
                              </li>
                              <li><span class="current page-number">1</span></li>
                              <li><a href="#" class="page-number">2</a></li>
                              <li><a href="#" class="page-number">3</a></li>
                              <li><a href="#" class="next page-number"><i
                                          class="fa fa-angle-double-right"></i></a></li>
                           </ul>
                        </nav>
                        --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Gallery Wrapper End -->

      </div>
      <!-- Main Content Wrapper End -->

@endsection

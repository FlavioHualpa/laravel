<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="mariscal,ajmechet,escolar,afiche,cartulina,crepe,seda,araña,lunares">

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.title', 'Mariscal') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- dl Icon CSS -->
    <link rel="stylesheet" href="{{ asset('css/dl-icon.css') }}">

    <!-- All Plugins CSS css -->
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">

    <!-- Revoulation Slider CSS  -->
    <link rel="stylesheet" href="{{ asset('css/revoulation.css') }}">

    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

   <div class="ai-preloader active">
      <div class="ai-preloader-inner h-100 d-flex align-items-center justify-content-center">
         <div class="ai-child ai-bounce1"></div>
         <div class="ai-child ai-bounce2"></div>
         <div class="ai-child ai-bounce3"></div>
      </div>
   </div>

    <!-- Main Wrapper Start -->
    <div class="wrapper">
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
                                               (+54) 11 4854-8521 / 3901
                                            </span>
                                        </div>
                                        <div class="header-contact-info__item">
                                            <span>
                                               <i class="fa fa-whatsapp"></i>
                                               WhatsApp
                                            </span>
                                            <span>
                                               005491128663595
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
                                                <button type="submit" class="searchform__submit">
                                                </button>
                                            </form>
                                        </div>
                                        <ul class="header-toolbar text-right">
                                            <li class="header-toolbar__item user-info-menu-btn">
                                                <a href="{{ route('login') }}">
                                                    <i class="fa fa-user-circle-o"></i>
                                                </a>
                                                <ul class="user-info-menu">
                                                    <li>
                                                        <a href="{{ route('login') }}">
                                                            Ingresar
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="header-toolbar__item">
                                                <a href="{{ route('cart') }}" class="mini-cart-btn toolbar-btn">
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
                                                            <a href="{{ url($itemNiv3->url) }}">
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

                                            {{--
                                            <li class="mainmenu__item menu-item-has-children">
                                                <a href="shop-sidebar.html" class="mainmenu__link">
                                                    <span class="mm-text">Shop</span>
                                                    <span class="tip">Hot</span>
                                                </a>
                                                <ul class="megamenu four-column">
                                                    <li>
                                                        <a class="megamenu-title" href="#">
                                                            <span class="mm-text">Shop Layout</span>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <a href="shop-fullwidth.html">
                                                                    <span class="mm-text">FullWidth</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-sidebar.html">
                                                                    <span class="mm-text">with Sidebar</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-two-column.html">
                                                                    <span class="mm-text">Two columns</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-three-column.html">
                                                                    <span class="mm-text">Three columns</span>
                                                                </a>
                                                            </li>
    
                                                            <li>
                                                                <a href="shop-no-gutter.html">
                                                                    <span class="mm-text">Shop No Gutter</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-list.html">
                                                                    <span class="mm-text">Shop List</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="megamenu-title" href="#">
                                                            <span class="mm-text">Single Product</span>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <a href="product-details.html">
                                                                    <span class="mm-text">Simple 01</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-02.html">
                                                                    <span class="mm-text">Simple 02</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-sticky.html">
                                                                    <span class="mm-text">Sticky Info</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-gallery.html">
                                                                    <span class="mm-text">Thumbnail Gallery</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-sidebar.html">
                                                                    <span class="mm-text">Sidebar</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-grouped.html">
                                                                    <span class="mm-text">Grouped</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-affiliate.html">
                                                                    <span class="mm-text">Affiliate</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-details-configurable.html">
                                                                    <span class="mm-text">Configurable</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="megamenu-title" href="#">
                                                            <span class="mm-text">Shop Pages</span>
                                                        </a>
                                                        <ul>
                                                            <li>
                                                                <a href="my-account.html">
                                                                    <span class="mm-text">My Account</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="cart.html">
                                                                    <span class="mm-text">Shopping Cart</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="checkout.html">
                                                                    <span class="mm-text">Check Out</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html">
                                                                    <span class="mm-text">Wishlist</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="order-tracking.html">
                                                                    <span class="mm-text">Order tracking</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="compare.html">
                                                                    <span class="mm-text">compare</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="d-none d-lg-block banner-holder">
                                                        <div class="megamenu-banner">
                                                            <div class="megamenu-banner-image"></div>
                                                            <div class="megamenu-banner-info">
                                                                <span>
                                                                    <a href="shop-sidebar.html">woman</a>
                                                                    <a href="shop-sidebar.html">shoes</a>
                                                                </span>
                                                                <h3>new <strong>season</strong></h3>
                                                            </div>
                                                            <a href="shop-sidebar.html" class="megamenu-banner-link"></a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mainmenu__item">
                                                <a href="about-us.html" class="mainmenu__link">
                                                    <span class="mm-text">Collections</span>
                                                </a>
                                            </li>
                                            <li class="mainmenu__item menu-item-has-children has-children">
                                                <a href="blog.html" class="mainmenu__link">
                                                    <span class="mm-text">Pages</span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li>
                                                        <a href="about-us.html">
                                                            <span class="mm-text">About Us</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="team.html">
                                                            <span class="mm-text">Our teams</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="contact-us.html">
                                                            <span class="mm-text">Contact us 1</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="contact-us-02.html">
                                                            <span class="mm-text">Contact us 2</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="404.html">
                                                            <span class="mm-text">404 page</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="faqs-page.html">
                                                            <span class="mm-text">FAQs page</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="coming-soon.html">
                                                            <span class="mm-text">Coming Soon</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mainmenu__item menu-item-has-children has-children">
                                                <a href="blog.html" class="mainmenu__link">
                                                    <span class="mm-text">Blog</span>
                                                </a>
                                                <ul class="sub-menu">
                                                    <li class="menu-item-has-children has-children">
                                                        <a href="#">
                                                            <span class="mm-text">Blog Grid</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a href="blog-02-columns.html">
                                                                    <span class="mm-text">Blog 02 Column</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-03-columns.html">
                                                                    <span class="mm-text">Blog 02 Column</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="menu-item-has-children has-children">
                                                        <a href="#">
                                                            <span class="mm-text">Blog List</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a href="blog.html">
                                                                    <span class="mm-text">Blog Sidebar</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-standard.html">
                                                                    <span class="mm-text">Blog Standard</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-no-sidebar.html">
                                                                    <span class="mm-text">Blog No Sidebar</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="blog-masonary.html">
                                                            <span class="mm-text">Blog Masonary</span>
                                                        </a>
                                                    </li>
                                                    <li class="menu-item-has-children has-children">
                                                        <a href="#">
                                                            <span class="mm-text">Blog Details</span>
                                                        </a>
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a href="single-post.html">
                                                                    <span class="mm-text">Single Post</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-sidebar.html">
                                                                    <span class="mm-text">Single Post Sidebar</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="mainmenu__item">
                                                <a href="shop-instagram.html" class="mainmenu__link">
                                                    <span class="mm-text">New Look</span>
                                                </a>
                                            </li>
                                            --}}
                                        
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
    
    </div>
    
    <!-- ************************* JS Files ************************* -->

    <!-- jQuery JS -->
    <script src="{{ asset('js/vendor/jquery.min.js') }}"></script>

    <!-- Bootstrap and Popper Bundle JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- All Plugins Js -->
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- Ajax Mail Js -->
    <script src="{{ asset('js/ajax-mail.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('js/main.js') }}"></script>


    <!-- REVOLUTION JS FILES -->
    <script src="{{ asset('js/revoulation/jquery.themepunch.tools.min') }}.js"></script>
    <script src="{{ asset('js/revoulation/jquery.themepunch.revolution') }}.min.js"></script>    

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('js/revoulation/extensions/revolution.extension.video.min.js') }}"></script>

    <!-- REVOLUTION ACTIVE JS FILES -->
    <script src="{{ asset('js/revoulation.js') }}"></script>

</body>
</html>

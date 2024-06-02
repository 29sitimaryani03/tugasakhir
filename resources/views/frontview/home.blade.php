<!DOCTYPE html>
<html lang="en">


<!-- molla/index-5.html  22 Nov 2019 09:55:58 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if ($logo && is_string($logo->url_ico))
    <link rel="shortcut icon" href="{{ url('public') }}/{{ $logo->url_ico }}">
    @else
    @endif

    @if ($logo)
    <title>{{ $logo->name }}</title>
    @else
    <!-- Jika data logo kosong, Anda dapat menampilkan logo default atau pesan lain -->
    <title></title>
    @endif
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="manifest" href="{{ url('public') }}/front/assets/images/icons/site.html">
    <link rel="mask-icon" href="{{ url('public') }}/front/assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="{{ url('public') }}/front/assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ url('public') }}/front/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/style.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/skins/skin-demo-5.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/demos/demo-5.css">

    <style>
        .product-image,
        .product-image-hover {
            height: 200px;
            object-fit: cover;
            width: 100%;
            /* Optional, to make sure the width is consistent */
        }

        .white-text {
            color: white;
            font-size: large;
            font-weight: 300;
        }

        .white-text:hover {
            color: #f0f0f0;
            /* Warna lebih terang saat di-hover */
        }
    </style>

</head>

<body>
    <div id="top-bar">
        <div class="page-wrapper">
            <header class="header header-5">
                <div class="header-middle sticky-header">
                    <div class="container-fluid">
                        <div class="header-left">
                            <button class="mobile-menu-toggler">
                                <span class="sr-only">Toggle mobile menu</span>
                                <i class="icon-bars"></i>
                            </button>

                            <a href="index.html" class="logo">
                                @if ($logo)
                                <img src="{{ url('public') }}/{{ $logo->url_logo }}" alt="Logo" width="82" height="25" />
                                @else
                                @endif
                            </a>

                            <nav class="main-nav">
                                <ul class="menu sf-arrows">
                                    <li class="megamenu-container active">
                                        <a href="{{ url('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('shop') }}">Shop</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('pesan') }}">Order</a>
                                    </li>
                                </ul><!-- End .menu -->
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-left -->

                        <div class="header-right">
                            <div class="header-search header-search-extended header-search-visible">
                                <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                                <form action="{{ url('shop/filter') }}" method="POST">
                                    @csrf
                                    <div class="header-search-wrapper">
                                        <label for="q" class="sr-only">Search</label>
                                        <input type="search" class="form-control" name="nama" id="q" placeholder="Cari Produk..." required>
                                    </div><!-- End .header-search-wrapper -->
                                </form>
                            </div><!-- End .header-search -->
                            <div class="dropdown cart-dropdown">
                                <a href="{{ url('cart') }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" data-display="static">
                                    <i class="icon-shopping-cart"></i>
                                    @auth
                                    @php
                                    $cartCount = App\Models\Keranjang::where('id_user', Auth::id())->count();
                                    @endphp
                                    @if($cartCount > 0)
                                    <span class="cart-count">{{ $cartCount }}</span>
                                    @endif
                                    @endauth
                                </a>
                            </div>
                            <br>
                            <nav class="main-nav ml-7">
                                <ul class="menu sf-arrows">
                                    <li class="mr-0 ml-4">
                                        @if (Auth::check())
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle white-text" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ request()->user()->nama }}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" style="font-size: medium;" href="{{ url('profile') }}">Profile</a>
                                                <a class="dropdown-item" style="font-size: medium;" href="{{ url('settings') }}">Settings</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" style="font-size: medium;" href="{{ url('logout') }}" onclick="return confirm('Apakah anda yakin akan logout ?')">Logout</a>
                                            </div>
                                        </div>
                                        @else
                                        <a href="{{ url('login') }}">Login</a>
                                        @endif
                                    </li>
                                </ul>
                            </nav><!-- End .main-nav -->
                        </div><!-- End .header-right -->
                    </div><!-- End .container-fluid -->
                </div><!-- End .header-middle -->
        </div>
        </header><!-- End .header -->

        <main class="main">
            <div class="intro-slider-container mb-0">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" data-owl-options='{"nav": false, "dots": false}'>
                    <div class="intro-slide" style="position: relative; background-image: url({{ url('public') }}/{{ $banner->url_banner }}); background-size: cover; background-position: center;">
                        <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);">
                        </div>
                        <div class="container intro-content text-center" style="position: relative; z-index: 1;">
                            <h1 class="intro-title text-white">Amplang Kite</h1>
                            <br>
                            <h4 style="font-size: 50px;" class="intro-title text-white">Cemilan Khas Ketapang</h4><!-- End .intro-title -->
                            <br>
                            <a href="{{ url('shop') }}" class="btn btn-primary">Jelajahi</a>
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .intro-slider owl-carousel owl-theme -->

                <span class="slider-loader text-white"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="container pt-6 new-arrivals">
                <div class="heading heading-center mb-3">
                    <h2 class="title">Produk Amplang Kite</h2><!-- End .title -->
                </div><!-- End .heading -->

                <div class="tab-content">
                    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                        <div class="products">
                            <div class="row justify-content-center">
                                @foreach ($list_produk as $produk)
                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <a href="{{ url('product', $produk->id) }}">
                                                <img src="{{ url('public', $produk->thumbnail_produk) }}" alt="Product image" class="product-image" style="height: 280px; object-fit: cover;">
                                                <img src="{{ url('public', $produk->thumbnail_produk) }}" alt="Product image" class="product-image-hover" style="height: 280px; object-fit: cover;">
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action product-action-transparent">
                                                <a href="{{ url('product', $produk->id) }}" class="btn-product btn-cart"><span>Tambah Keranjang</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <h3 class="product-title" style="font-size: large; font-weight:500;">
                                                <a href="{{ url('product', $produk->id) }}">{{ $produk->nama_produk }}</a>
                                            </h3><!-- End .product-title -->
                                            <div class="product-price">
                                                Stok : {{ $produk->stok_produk }}
                                            </div><!-- End .product-price -->
                                            <div class="product-price">
                                                Rp. {{ number_format($produk->harga_produk) }}
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                                @endforeach
                            </div><!-- End .row -->
                        </div><!-- End .products -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->

                <div class="more-container text-center mt-1 mb-3">
                    <a href="{{ url('shop') }}" class="btn btn-outline-primary-2 btn-round btn-more">Selengkapnya</a>
                </div><!-- End .more-container -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-5 -->

            <div class="video-banner video-banner-bg bg-image text-center" style="background-image: url({{ url('public') }}/front/assets/images/demos/demo-5/bg-2.jpg)">
                <div class="container">
                    <h3 class="video-banner-title h1 text-white"><span>New Collection</span><strong>Winter’19 <i>/</i>
                            Spring’20</strong></h3><!-- End .video-banner-title -->
                    <a href="https://www.youtube.com/watch?v=n0zgEHOKFYk" class="btn-video btn-iframe"><i class="icon-play"></i></a>
                </div><!-- End .container -->
            </div><!-- End .video-banner bg-image -->
        </main><!-- End .main -->

        <footer class="footer footer-dark">
            <div class="icon-boxes-container">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-rocket"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                                    <p>Orders $50 or more</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-rotate-left"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                                    <p>Within 30 days</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-info-circle"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                                    <p>When you sign up</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="icon-box icon-box-side">
                                <span class="icon-box-icon">
                                    <i class="icon-life-ring"></i>
                                </span>

                                <div class="icon-box-content">
                                    <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                                    <p>24/7 amazing services</p>
                                </div><!-- End .icon-box-content -->
                            </div><!-- End .icon-box -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .icon-boxes-container -->
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                @if ($logo)
                                <img class="footer-logo" alt="Footer Logo" width="82" height="25" src="{{ url('public') }}/{{ $logo->url_logo }}" alt="..." />
                                @else
                                @endif
                                <div>
                                    @if ($footer)
                                    {!! $footer->text !!}
                                    @else
                                    @endif
                                </div>
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Link Media Sosial</h4><!-- End .widget-title -->
                                <ul class="widget-list">
                                    @foreach ($sosmed as $s)
                                    <li>
                                        <a href="{{ $s->link }}">{{ $s->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Payment Methods</a></li>
                                    <li><a href="#">Money-back guarantee!</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div>
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">
                        Copyright © 2024
                        @if ($logo)
                        <a href="#"> {{ $logo->name }}</a>
                        @else
                        @endif
                        All Rights Reserved
                    </p><!-- End .footer-copyright -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="nav-link {{ request()->is('home') ? 'active' : '' }} ">
                        <a href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="nav-link {{ request()->is('shop') ? 'active' : '' }} ">
                        <a href="{{ url('shop') }}">Shop</a>
                    </li>
                    <li class="nav-link {{ request()->is('order') ? 'active' : '' }} ">
                        <a href="{{ url('order') }}">Order</a>
                    </li>
                </ul>
            </nav>
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Plugins JS File -->
    <script src="{{ url('public') }}/front/assets/js/jquery.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/superfish.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/owl.carousel.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.plugin.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.countdown.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ url('public') }}/front/assets/js/main.js"></script>
    <script src="{{ url('public') }}/front/assets/js/demos/demo-5.js"></script>
</body>


<!-- molla/index-5.html  22 Nov 2019 09:56:18 GMT -->

</html>
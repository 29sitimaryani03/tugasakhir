<header class="header">
    <div class="header-middle sticky-header">
        <div class="container-fluid">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('home') }}" class="logo">
                    @php
                    $logo = app('App\Http\Controllers\Admin\LogoController')->getLogo();
                    @endphp
                    @if($logo)
                    <img src="{{ url('public') }}/{{ $logo->url_logo }}" alt="Logo" alt="Logo" width="105" height="25">
                    @else
                    <!-- Jika data logo kosong, Anda dapat menampilkan logo default atau pesan lain -->

                    @endif
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="nav-link {{request()->is('home') ? 'active' : ''}} ">
                            <a href="{{ url('home') }}">Home</a>
                        </li>
                        <li class="nav-link {{request()->is('shop') ? 'active' : ''}} ">
                            <a href="{{ url('shop') }}">Shop</a>
                        </li>
                        <li class="nav-link {{request()->is('order') ? 'active' : ''}} ">
                            <a href="{{ url('order') }}">Order</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-left -->

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Cari Produk..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ url('cart') }}" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                    </a>
                </div><!-- End .cart-dropdown -->
                <br>
                <nav class="main-nav ml-7">
                    <ul class="menu sf-arrows">
                        <li class="mr-0 ml-4">
                            @if(Auth::check())
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" style="font-size: large; font-weight:500;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <a href="{{ url('login') }}">Silahkan Login</a>
                            @endif
                        </li>
                    </ul>
                </nav><!-- End .main-nav -->
            </div><!-- End .header-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->
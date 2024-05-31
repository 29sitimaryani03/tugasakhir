<!DOCTYPE html>
<html lang="en">


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('public') }}/front/assets/images/icons/icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('public') }}/front/assets/images/icons/icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('public') }}/front/assets/images/icons/icon.png">
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
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/style.css">
</head>

<body>
    <div class="page-wrapper">


        <main class="main">
            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
                style="background-image: url('/'/front/assets/images/backgrounds/bg.jpg')">
                <div class="container">
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2"
                                        role="tab" aria-controls="signin-2" aria-selected="true">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab-2" href="{{ url('regis') }}" role="tab"
                                        aria-controls="register-2" aria-selected="true">Daftar</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="signin-2" role="tabpanel"
                                    aria-labelledby="signin-tab-2">
                                    <x-template.utils.notif />
                                    <form action="{{ url('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email-2">Email</label>
                                            <input type="email" class="form-control" id="singin-email-2"
                                                name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password-2">Password</label>
                                            <input type="password" class="form-control" id="singin-password-2"
                                                name="password" required>
                                        </div><!-- End .form-group -->
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="signin-remember-2">
                                            </div><!-- End .custom-checkbox -->

                                            <!-- <a href="#" class="forgot-link">Forgot Your Password?</a> -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search"
                    placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>



        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->


    <!-- Plugins JS File -->
    <script src="{{ url('public') }}/front/assets/js/jquery.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.waypoints.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/superfish.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ url('public') }}/front/assets/js/main.js"></script>
</body>


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

</html>

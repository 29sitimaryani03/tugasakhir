<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        @php
                        $logo = app('App\Http\Controllers\Admin\LogoController')->getLogo();
                        @endphp
                        @if($logo)
                        <img src="{{ url('public') }}/{{ $logo->url_logo }}" alt="Logo" class="footer-logo" alt="Footer Logo" width="82" height="25">
                        @else
                        <!-- Jika data logo kosong, Anda dapat menampilkan logo default atau pesan lain -->

                        @endif
                        @php
                        $footer = app('App\Http\Controllers\Admin\FooterController')->getFooter();
                        @endphp
                        @if($footer)
                        <p>{!! $footer->text !!}</p>
                        @else
                        <!-- Jika data logo kosong, Anda dapat menampilkan logo default atau pesan lain -->

                        @endif
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Link Sosial Media</h4><!-- End .widget-title -->
                        @php
                        $sosmed = app('App\Http\Controllers\Admin\SosmedController')->getSosmed();
                        @endphp
                        <ul class="widget-list">
                            @foreach($sosmed as $s)
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
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">
                Copyright © 2024
                @if($logo)
                <a href="#"> {{ $logo->name }}</a>
                @else
                @endif
                All Rights Reserved
            </p><!-- End .footer-copyright -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer><!-- End .footer -->
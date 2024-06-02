<!DOCTYPE html>
<html lang="en">


<!-- molla/category-fullwidth.html  22 Nov 2019 10:03:02 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @php
    $logo = app('App\Http\Controllers\Admin\LogoController')->getLogo();
    @endphp
    @if($logo && is_string($logo->url_ico))
    <link rel="shortcut icon" href="{{ url('public') }}/{{ $logo->url_ico }}">
    @else
    @endif

    @if($logo)
    <title>{{$logo->name}}</title>
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
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{ url('public') }}/front/assets/css/plugins/nouislider/nouislider.css">
</head>

<body>
    <div class="page-wrapper">
        <x-section.header />

        <main class="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <x-template.utils.notif />
                    </div>
                </div>
            </div>
            {{ $slot }}
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->

    <x-section.footer />
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
    <script src="{{ url('public') }}/front/assets/js/wNumb.js"></script>
    <script src="{{ url('public') }}/front/assets/js/bootstrap-input-spinner.js"></script>
    <script src="{{ url('public') }}/front/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('public') }}/front/assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="{{ url('public') }}/front/assets/js/main.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ url('public') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ url('public') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ url('public') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ url('public') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('public') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $("#example4").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [
                    [3, 'desc']
                ], // Urutkan berdasarkan kolom keempat (jumlah terjual) secara descending
            }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
            $("#example3").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script>
        function gantiProvinsi(id) {
            $.get("api/provinsi/" + id, function(result) {
                result = JSON.parse(result)
                option = ""
                for (item of result) {
                    option += `<option value="${item.id}">${item.nama}</option>`;
                }
                $("#kabupaten").html(option)
            });
        }

        function gantiKabupaten(id) {
            $.get("api/kabupaten/" + id, function(result) {
                result = JSON.parse(result)
                option = ""
                for (item of result) {
                    option += `<option value="${item.id}">${item.nama}</option>`;
                }
                $("#kecamatan").html(option)
            });
        }

        function gantiKecamatan(id) {
            $.get("api/kecamatan/" + id, function(result) {
                result = JSON.parse(result)
                option = ""
                for (item of result) {
                    option += `<option value="${item.id}">${item.nama}</option>`;
                }
                $("#desa").html(option)
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk menangani klik pada gambar di galeri
            $('#product-zoom-gallery a').click(function(event) {
                event.preventDefault(); // Menghentikan perilaku default dari link

                // Mengubah sumber gambar utama menjadi sumber gambar yang di-klik di galeri
                var imageSource = $(this).data('image');
                $('#product-zoom').attr('src', imageSource);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Menginisialisasi ElevateZoom pada gambar utama
            $('#product-zoom').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Menangani klik pada tombol btn-product-gallery
            $('#btn-product-gallery').click(function(event) {
                event.preventDefault(); // Menghentikan perilaku default dari link

                // Mengambil sumber gambar dari product-main-image
                var imageSource = $('#product-zoom').attr('src');

                // Menetapkan sumber gambar ke modalImage
                $('#modalImage').attr('src', imageSource);

                // Menampilkan modal
                $('#productModal').modal('show');
            });
        });
    </script>
    <script>
        function checkCheckbox() {
            var checkboxes = document.querySelectorAll('input[name="checkout_product[]"]');
            var checked = false;
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checked = true;
                }
            });
            if (!checked) {
                alert("Pilih setidaknya satu produk untuk checkout.");
                return false;
            }
            return true;
        }
    </script>
    <script>
        function copyToClipboard(text) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert('Teks telah disalin: ' + text);
        }
    </script>
</body>


<!-- molla/category-fullwidth.html  22 Nov 2019 10:03:02 GMT -->

</html>
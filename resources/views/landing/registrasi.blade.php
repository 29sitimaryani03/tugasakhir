<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAMPLANG || REGISTRASI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('resources/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('resources/css/output.css') }}">
</head>

<body class="w-screen h-screen bg-slate-100 flex items-center justify-center">

    <form action="#" class="min-w-[29.9999%] bg-white rounded-md shadow-sm p-6">
        @csrf
        <div class="flex flex-col items-center justify-center pb-8">
            <h2 class="text-2xl text-pink-500 font-semibold">REGISTRASI AKUN</h2>
            <p class="text-sm text-slate-500">Silahkan lengkapi data akun anda.</p>
        </div>
        <div class="grid grid-cols-1 gap-3">
            <x-com-landing.input label="Nama" type="text" name="nama" placeholder="Masukan nama lengkap ..." />
            <x-com-landing.input label="Email" type="email" name="email" placeholder="Masukan email ..." />
            <x-com-landing.input label="Password" type="password" name="password" placeholder="Masukan password ..." />
            <x-com-landing.input label="Alamat" type="text" name="alamat" placeholder="Masukan alamat ..." />
            <div class="flex items-center justify-end">
                <button class="btns-signin">REGISTRASI</button>
            </div>
            <div class="flex items-center justify-center">
                <a href="{{ url('/login') }}" class="flex items-center justify-center gap-x-2 text-sm text-slate-500">
                    Sudah punya akun ?!, <span class="text-pink-500 font-medium">Login disini.</span>
                </a>
            </div>
        </div>
    </form>

    <!-- jQuery -->
    <script src="{{ url('public') }}/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 5.3.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</body>
</body>

</html>

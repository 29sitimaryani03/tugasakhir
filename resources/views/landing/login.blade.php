<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIAMPLANG</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/node_modules/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/css/output.css') }}">
</head>

<body class="dark:bg-slate-900 flex h-full items-center py-16 bg-gray-900">
    <main class="w-full max-w-md mx-auto p-6">
        <div class="mt-7 bg-white/85 border rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>

                </div>
                <div class="mt-5">
                    <!-- Form -->
                    <form action="{{ url('/aksiLogin') }}" method="POST">
                        @csrf
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <x-com-landing.input label="Email" type="email" name="email" placeholder="Masukan email ..." />
                            <x-com-landing.input label="Password" type="password" name="password" placeholder="Masukan Password      ..." />
                            <!-- Form Group -->

                            <!-- Checkbox -->
                            <div class="flex items-center">
                                <div class="flex">
                                    <input id="remember-me" name="remember-me" type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                </div>
                                <div class="ms-3">
                                    <label for="remember-me" class="text-sm dark:text-white">Ingatkan saya</label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Sign
                                up</button>
                        </div>
                    </form>
                    <!-- End Form -->
                    <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-[1_1_0%] before:border-t before:border-gray-200 before:me-6 after:flex-[1_1_0%] after:border-t after:border-gray-200 after:ms-6 dark:text-gray-500 dark:before:border-gray-600 dark:after:border-gray-600">
                        Or</div>
                        <div class="flex items-center justify-center">
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Belum punya akun ?
                                <a class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                    href="{{ url('/registrasi') }}">
                                    Registrasi disini !
                                </a>
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('resources/node_modules/preline/dist/preline.js') }}"></script>
    <!-- jQuery -->
    <script src="{{ url('public') }}/lte/plugins/jquery/jquery.min.js"></script>

</body>
</body>

</html>

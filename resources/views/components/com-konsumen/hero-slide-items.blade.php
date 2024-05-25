<div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center bg-transparent">
    <div>
        <h1 class="block text-3xl font-bold text-gray-100 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">{{ $title ?? '' }}</h1>
        <p class="mt-3 text-lg text-gray-200 dark:text-gray-400">{{ $prices ?? '' }}</p>
        <p class="mt-3 text-lg text-gray-200 dark:text-gray-400">{{ $desc ?? '' }}</p>

        <!-- Buttons -->
        <div class="mt-7 grid gap-3 w-full sm:inline-flex">
            <a class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                href="{{ $buy ?? '' }}">
                Masuk keranjang
                <i class="bi bi-chevron-right size-4"></i>
            </a>

        </div>
        <!-- End Buttons -->

        <!-- Review -->
        <div class="mt-6 lg:mt-10 grid grid-cols-2 gap-x-5">
            <!-- Review -->
            <div class="py-5">
                <div class="flex space-x-1">
                    <i class="bi bi-star-fill text-yellow-400"></i>
                    <i class="bi bi-star-fill text-yellow-400"></i>
                    <i class="bi bi-star-fill text-yellow-400"></i>
                    <i class="bi bi-star-fill text-yellow-400"></i>
                    <i class="bi bi-star-fill text-yellow-400"></i>
                </div>

                <p class="mt-3 text-sm text-gray-800 dark:text-gray-200">
                    <span class="font-bold">4.6</span> /5 - from 12k reviews
                </p>


            </div>
            <!-- End Review -->

        </div>
        <!-- End Review -->
    </div>
    <!-- End Col -->

    <div class="relative ms-4">
        <div class="flex h-screen items-center justify-center">
            <img class="w-full h-auto rounded-md" src="{{ $image ?? '' }}" alt="Image Description">
        </div>
        <div
            class="absolute inset-0 -z-[1] bg-gradient-to-tr from-gray-200 via-white/0 to-white/0 size-full rounded-md mt-4 -mb-4 me-4 -ms-4 lg:mt-6 lg:-mb-6 lg:me-6 lg:-ms-6 dark:from-slate-800 dark:via-slate-900/0 dark:to-slate-900/0">
        </div>

        <!-- SVG-->
        <div class="absolute bottom-0 start-0">
            <svg class="w-2/3 ms-auto h-auto text-white dark:text-slate-900" width="630" height="451"
                viewBox="0 0 630 451" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="531" y="352" width="99" height="99" fill="currentColor" />
                <rect x="140" y="352" width="106" height="99" fill="currentColor" />
                <rect x="482" y="402" width="64" height="49" fill="currentColor" />
                <rect x="433" y="402" width="63" height="49" fill="currentColor" />
                <rect x="384" y="352" width="49" height="50" fill="currentColor" />
                <rect x="531" y="328" width="50" height="50" fill="currentColor" />
                <rect x="99" y="303" width="49" height="58" fill="currentColor" />
                <rect x="99" y="352" width="49" height="50" fill="currentColor" />
                <rect x="99" y="392" width="49" height="59" fill="currentColor" />
                <rect x="44" y="402" width="66" height="49" fill="currentColor" />
                <rect x="234" y="402" width="62" height="49" fill="currentColor" />
                <rect x="334" y="303" width="50" height="49" fill="currentColor" />
                <rect x="581" width="49" height="49" fill="currentColor" />
                <rect x="581" width="49" height="64" fill="currentColor" />
                <rect x="482" y="123" width="49" height="49" fill="currentColor" />
                <rect x="507" y="124" width="49" height="24" fill="currentColor" />
                <rect x="531" y="49" width="99" height="99" fill="currentColor" />
            </svg>
        </div>
        <!-- End SVG-->
    </div>
    <!-- End Col -->
</div>

<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <img class="rounded-t-lg" src="{{ $img ?? '' }}" alt="product image" />
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="my-6 text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $title ?? '' }}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                <span class="text-slate-600 text-xs font-semibold px-2.5 py-0.5 rounded bg-green-500/50 ms-3">{{ $varianproduk ?? '' }}</span>
                <span class="text-slate-600 text-xs font-semibold px-2.5 py-0.5 rounded bg-blue-500/50 ms-3">{{ $varianrasa ?? '' }}</span>
                <span class="text-slate-600 text-xs font-semibold px-2.5 py-0.5 rounded bg-orange-500/50 ms-3">{{ $berat ?? '' }}</span>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ $harga ?? '' }}</span>
        </div>

    </div>
    <div class="p-3">
        <a href="{{ $urlkeranjang ?? '#' }}" class="text-blue-700 bg-slate-300 hover:bg-slate-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{ $keranjangtitle ?? '' }}</a>
        <a href="{{ $urlheckout ?? '#' }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">{{ $checkouttitle ?? '' }}</a>
    </div>
</div>

<x-com-konsumen.app>
    <!-- Hero -->
    {{-- <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 bg-pink-600">
        <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper bg-transparent">
                <!-- Slides -->
                @foreach ($list as $item)
                    <div class="swiper-slide bg-transparent">
                        <x-com-konsumen.hero-slide-items image="{{ asset('public/' . $item->thumbnail_produk) }}"
                            title="{{ $item->nama_produk }}" prices="{{ $item->harga_produk }}"
                            desc="{!! Str::limit($item->deskripsi_produk, 60) !!}" buy="" />

                    </div>
                @endforeach
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <!-- Grid -->

        <!-- End Grid -->
    </div> --}}
    <!-- End Hero -->
</x-com-konsumen.app>

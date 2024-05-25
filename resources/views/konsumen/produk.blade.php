<x-com-konsumen.app>
    <div class="md:mx-[150px] pb-[100px]">
        <!-- Grid -->
        <div class="grid grid-cols-12 pt-[150px]">
            <div class="lg:col-span-12">
                <h1
                    class="text-center block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                    Produk <span class="text-blue-600">Kami</span>
                </h1>
            </div>
            <div class=" lg:col-span-12  mt-[100px]">
                <div class="grid grid-cols-3 gap-6">
                    @foreach ($list as $item)
                        <x-com-konsumen.produk-card
                                img="{{ asset('public/'. $item->thumbnail_produk) }}"
                                title="{{ $item->nama_produk }}"
                                varianproduk="{{ $item->varian_produk }}"
                                varianrasa="{{ $item->varian_rasa }}"
                                harga="{{ $item->harga_produk }}"
                                berat="{{ $item->berat_produk }}"
                                urlkeranjang="{{ url('konsumen/masukeranjang', $item->id) }}"
                                keranjangtitle="Masuk Keranjang"
                                urlheckout="{{ $item->varian_produk }}"
                                checkouttitle="Beli Langsung"
                        />
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Grid -->
    </div>
</x-com-konsumen.app>

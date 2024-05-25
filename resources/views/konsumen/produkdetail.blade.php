<x-com-konsumen.app>
    @foreach ($list as $produk)@endforeach
    <div class="md:mx-[150px] pb-[100px]">
        <!-- Grid -->
        <div class="pt-[150px]">
            <div class="grid grid-cols-12 gap-6 bg-white p-3 rounded-md">
                <div class="col-span-4">
                    <div class="mb-6">
                        <img src="{{ asset('public/'. $produk->thumbnail_produk) }}" alt="No image .." class="w-full h-full">
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach ($produk->galeri as $galeri)
                            <div class=" bg-white w-full h-[120px] runded-md hover:shadow-md overflow-hidden">
                                <img src="{{ asset('public/'. $galeri->gambar) }}" alt="No image .." class="w-full h-full">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-span-8">
                    <ul>
                        <li class="flex items-center justify-between py-6">
                            <span class="font-semibold text-base text-pink-500">{{ $produk->nama_produk }}</span>
                            <span class="text-2xl text-green-500 font-bold">{{ $produk->harga_produk }}</span>
                        </li>
                        <li>
                        </li>
                        <li class="flex items-center gap-3 mb-12">
                            <span>{{ $produk->berat_produk }}</span>
                            <span>{{ $produk->varian_produk }}</span>
                            <span>{{ $produk->varian_rasa }}</span>
                        </li>
                        <li class="inline-block w-full h-24 overflow-y-clip hover:overflow-y-auto hover:h-full relative">
                            <span>{!! $produk->deskripsi_produk !!}</span>
                            <span class="px-2.5 py-1.5 text-center flex items-center w-[100px] text-sm font-normal text-blue-500">Selengkapnya >></span>
                        </li>
                        <form action="{{ url('konsumen/prosesmasukkeranjang', $produk->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_konsumen" value="{{ Auth::user()->id }}">
                            <li class="flex items-center gap-6">
                                <div class="flex items-center border-2 border-slate-400 rounded-full">
                                    <span class="minus hover:bg-red-600 cursor-pointer w-10 h-10 rounded-full flex items-center justify-center bg-red-500 text-white">
                                        <i class="bi bi-dash-circle"></i>
                                    </span>
                                    <input type="text" name="banyak_produk" value="0" id="qty" placeholder="Qty" class="text-center w-20 px-3 py-1.5 outline-none text-sm rouned-md" readonly>
                                    <span class="plus hover:bg-green-600 cursor-pointer w-10 h-10 rounded-full flex items-center justify-center bg-green-500 text-white">
                                        <i class="bi bi-plus-circle"></i>
                                    </span>
                                </div>
                                <button class="px-3 py-2 text-center items-center justify-center flex bg-pink-500 hover:bg-pink-600 focus:bg-pink-600 text-white text-sm rounded-md">Tambahkan ke keranjang</button>
                            </li>
                            <li class="flex items-center  py-2">
                                <input type="hidden" name="jumlah_harga" id="total" >
                                <span class="px-6 text-center font-semibold text-3xl text-pink-500" id="txttotal"></span>
                            </li>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    @push('js')
        <script>
            var kurang = $('.minus');
            var tambah = $('.plus');
            var qty = $('#qty');
            var total = $('#total');
            var txttotal = $('#txttotal');
            var count = 0;
            var stok = {{ $produk->stok_produk }};
            var harga = {{ $produk->harga_produk }};

            var hitung = qty.val() * harga;
            total.val(hitung)
            txttotal.html('Rp.' + '0')

            kurang.on('click', function(){

                if(count <= 0){
                    qty.val(0)
                    total.val(0)

                }else{
                    count--;
                    qty.val(count);
                    hitung = count * harga;
                    total.val(hitung)
                    txttotal.html('Rp.' + hitung)
                }
            })

            tambah.on('click', function(){
                count++;

                if(count > stok){
                    qty.val(stok)
                }else{
                    qty.val(count);
                    hitung = count * harga;
                    total.val(hitung)
                    txttotal.html('Rp.' + hitung)
                }
            })
        </script>
    @endpush
</x-com-konsumen.app>

<x-com-konsumen.app>
    <div class="md:mx-[150px] pb-[100px]">
        <!-- Grid -->
        <div class="grid grid-cols-12 pt-[150px]">
            <div class="lg:col-span-12">
                <h1
                    class="text-center block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                    Keranjang <span class="text-blue-600">Belanja</span>
                </h1>
            </div>
            <div class="lg:col-span-12 mt-[50px]">
                <div class="bg-white p-3">
                    <form action="{{ url('/konsumen/checkout') }}" method="POST">
                        @csrf
                        <x-com-konsumen.table>
                            <thead>
                                <tr class="border border-slate-400">
                                    <x-com-konsumen.th title="#" />
                                    <x-com-konsumen.th title="Produk" />
                                    <x-com-konsumen.th title="Banyak" />
                                    <x-com-konsumen.th title="Total" />
                                    <x-com-konsumen.th title="Tanggal" />
                                    <x-com-konsumen.th title="Aksi" />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)

                                    <tr class="border border-slate-400 py-2">
                                        <x-com-konsumen.td-action>
                                            <input type="checkbox" name="id[]" value="{{ $item->id }}"
                                                class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 rounded focus:ring-pink-500 dark:focus:ring-pink-600 ">
                                        </x-com-konsumen.td-action>
                                        <x-com-konsumen.td-action>
                                            <div class="flex justify-center gap-3">
                                               <div>
                                                    <img src="{{ asset('public/'. $item->produk->thumbnail_produk) }}" alt="" class="w-[110px] rounded-md">
                                               </div>
                                               <ul class="flex flex-col items-start">
                                                    <li>
                                                        <span class="text-sm font-medium text-pink-600">{{ $item->produk->nama_produk }}</span>
                                                    </li>
                                                    <li>
                                                        <span class="text-base font-medium text-green-600">{{ $item->produk->harga_produk }}</span>
                                                    </li>
                                                    <li class="flex items-center gap-2 mt-3">
                                                        <span class="px-3 py-1.5 bg-green-200 text-[12px] rounded-full">{{ $item->produk->varian_produk }}</span>
                                                        <span class="px-3 py-1.5 bg-blue-200 text-[12px] rounded-full">{{ $item->produk->varian_rasa }}</span>
                                                    </li>
                                               </ul>
                                            </div>
                                        </x-com-konsumen.td-action>
                                        <x-com-konsumen.td title="{{ $item->banyak_produk }}" />
                                            <td class="hidden harga-produk"  data-harga="{{ $item->produk->harga_produk * $item->banyak_produk }}"></td>
                                        <x-com-konsumen.td title="{{ $item->produk->harga_produk * $item->banyak_produk }}" />
                                        <x-com-konsumen.td title="{{ $item->tglIndo() }}" />
                                        <x-com-konsumen.td-action>
                                            <a href="#hapusData{{ $item->id }}" class="px-3 py-2"  data-bs-toggle="modal">
                                                <i class="bi bi-trash text-red-500"></i>
                                            </a>
                                        </x-com-konsumen.td-action>
                                    </tr>


                                    <x-com-konsumen.modal-delete id="hapusData{{ $item->id }}" action="{{ url('konsumen/hapusKeranjang', $item->id) }}" />

                                @endforeach
                            </tbody>
                        </x-com-konsumen.table>
                        <ul>
                            <p rowspan="3" colspan="6"
                                class="flex items-center justify-end gap-3 w-full py-2 px-6">Total
                                <span  id="total-harga" class="text-xl font-semibold text-green-500">Rp.0</span></p>
                            <p class="flex items-center justify-end gap-3 py-2">
                                <button
                                    class="px-3 py-2 border border-pink-500 bg-pink-500 hover:bg-pink-700 focus:bg-pink-700 rounded-md text-sm text-white">Checkout</button>
                            </p>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    @push('js')

    <script>
        $(document).ready(function() {
            // Ketika ada perubahan pada checkbox
            $('input[type="checkbox"]').change(function() {
                var totalHarga = 0;
                // Loop melalui setiap checkbox yang dicentang
                $('input[type="checkbox"]:checked').each(function() {
                    var closest_tr = $(this).closest('tr');
                    var total =  parseFloat(closest_tr.find('.harga-produk').attr('data-harga'));
                    console.log(total)
                    totalHarga += total;
                });
                // Tampilkan total harga
                $('#total-harga').text(formatRupiah(totalHarga));
            });
        });
         // Fungsi untuk format Rupiah
    function formatRupiah(angka) {
        var number_string = angka.toString();
        var sisa = number_string.length % 3;
        var rupiah = number_string.substr(0, sisa);
        var ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            var separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return 'Rp ' + rupiah;
    }
    </script>

    @endpush
</x-com-konsumen.app>

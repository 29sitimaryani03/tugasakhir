<x-com-konsumen.app>

    <div class="md:mx-[150px] pb-[100px]">
        <!-- Grid -->
        <div class="grid grid-cols-12 pt-[150px]">
            <div class="lg:col-span-12">
                <h1
                    class="text-center block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                    METODE <span class="text-blue-600">PEMBAYARAN</span>
                </h1>
                <p class="text-center font-medium text-xl text-slate-500">Silahkan lengkapi metode pembayaran anda !</p>
            </div>
            <div class="lg:col-span-12 mt-[50px]">
                <div class="bg-white p-3">
                    <form action="{{ url('/konsumen/prosescheckout') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_konsumen" value="{{ $konsumen }}">
                        @foreach ($keranjang as $item)
                            <input type="hidden" name="kode_keranjang[]" value="{{ $item->kode_keranjang }}">
                            <input type="hidden" name="id_produk[]" value="{{ $item->id }}">
                            <input type="hidden" name="banyak_produk[]" value="{{ $item->banyak_produk }}">
                            <input type="hidden" name="jumlah_harga[]" value="{{ $item->jumlah_harga }}">
                        @endforeach
                        <ul class="flex flex-col">
                            <li class="py-2 flex items-center gap-3">
                                <span class="w-[150px] block  text-sm font-medium text-slate-500">Jumlah produk</span>
                                <span>:</span>
                                <span>{{ $jumlah_produk }}</span>
                            </li>
                            <li class="py-2 flex items-center gap-3">
                                <span class="w-[150px] block text-sm font-medium text-slate-500">Total Harga</span>
                                <span>:</span>
                                <span>{{ $total_harga }}</span>
                            </li>
                            <li class="py-2">
                                <label for="met" class="text-sm font-medium text-slate-500">Metode Pembayaran</label>
                                <div class="relative">
                                    <select name="metode_pembayaran" class="block appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:border-pink-500" id="met">
                                      <option>--- Pilih metode pembayaran ---</option>
                                      <option value="Transfer">Transfer</option>
                                      <option value="Bayar Langsung">Bayar Langsung</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <i class="bi bi-chevron-down h-4 w-4"></i>
                                    </div>
                                  </div>
                            </li>
                            <li class="py-2 hidden" id="metUpload">
                                <div class="relative border-2 border-slate-300 border-dashed bg-slate-50 w-full h-[250px] rounded-md flex flex-col items-center justify-center">
                                    <input id="fileInput" type="file" name="bukti_pembayaran" class="w-full h-full absolute top-0 left-0 z-50 opacity-0">
                                    <div id="uploadPlaceholder">
                                        <div class="flex flex-col items-center justify-center gap-3">
                                            <i class="bi bi-image text-[60px] text-slate-300"></i>
                                            <span class="text-sm text-slate-400">Upload Bukti pembayaran anda disini !</span>
                                        </div>
                                    </div>
                                    <div id="imagePreview" class="hidden w-1/2 h-[250px] overflow-hidden">
                                        <img src="" alt="No image ..." >
                                    </div>
                                </div>
                            </li>
                            <li class="flex items-center justify-end py-3">
                                <button
                                    class="px-3 py-2 border border-pink-500 bg-pink-500 hover:bg-pink-700 focus:bg-pink-700 rounded-md text-sm text-white">Checkout</button>
                            </li>
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


            $('#met').on('change', function(){
               var met = $(this).val();
               if (met == 'Transfer') {
                    $('#metUpload').toggleClass('hidden')
               }else{
                $('#metUpload').addClass('hidden')
               }
            })

            $('#fileInput').change(function() {
            const file = this.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                $('#uploadPlaceholder').addClass('hidden');
                $('#imagePreview').removeClass('hidden').find('img').attr('src', e.target.result);
            };

            reader.readAsDataURL(file);
        });
        })
    </script>

    @endpush
</x-com-konsumen.app>

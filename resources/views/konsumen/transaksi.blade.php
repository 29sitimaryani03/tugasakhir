<x-com-konsumen.app>
    <div class="md:mx-[150px] pb-[100px]">
        <!-- Grid -->
        <div class="grid grid-cols-12 pt-[150px]">
            <div class="lg:col-span-12">
                <h1
                    class="text-center block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                    Transaksi <span class="text-blue-600">Saya</span>
                </h1>
            </div>
            <div class="lg:col-span-12 mt-[50px]">
                <div class="bg-white p-3">
                        <x-com-konsumen.table>
                            <thead>
                                <tr class="border border-slate-400">
                                    <x-com-konsumen.th title="#" />
                                    <x-com-konsumen.th title="Kode  " />
                                    <x-com-konsumen.th title="Jumlah Produk" />
                                    <x-com-konsumen.th title="Total Harga" />
                                    <x-com-konsumen.th title="Status" />
                                    <x-com-konsumen.th title="Waktu Transaksi" />
                                    <x-com-konsumen.th title="Aksi" />
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)

                                    <tr class="border border-slate-400 py-2">
                                        <x-com-konsumen.td title="{{ $loop->iteration }}" />
                                        <x-com-konsumen.td title="{{ $item->kode_transaksi }}" />
                                        <x-com-konsumen.td title="{{ $item->jumlah_produk }}" />
                                        <x-com-konsumen.td title="{{ $item->total_harga }}" />
                                        <x-com-konsumen.td-action>
                                            @if ($item->status_transaksi == 'New')
                                                <span class="px-3 py-1.5 bg-blue-500/50 text-[11px] rounded-full text-slate-600 uppercase font-semibold">{{ $item->status_transaksi }}</span>
                                                @elseif($item->status_transaksi == 'Aprove')
                                                <span class="px-3 py-1.5 bg-purple-500/50 text-[11px] rounded-full text-slate-600 uppercase font-semibold">{{ $item->status_transaksi }}</span>
                                                @elseif($item->status_transaksi == 'Panding')
                                                <span class="px-3 py-1.5 bg-yellow-500/50 text-[11px] rounded-full text-slate-600 uppercase font-semibold">{{ $item->status_transaksi }}</span>
                                                @elseif($item->status_transaksi == 'Success')
                                                <span class="px-3 py-1.5 bg-green-500/50 text-[11px] rounded-full text-slate-600 uppercase font-semibold">{{ $item->status_transaksi }}</span>
                                                @elseif($item->status_transaksi == 'Cancel')
                                                <span class="px-3 py-1.5 bg-red-500 text-[11px] rounded-full text-white">{{ $item->status_transaksi }}</span>
                                            @endif
                                        </x-com-konsumen.td-action>
                                        <x-com-konsumen.td title="{{ $item->tglIndo().' | '.$item->jamIndo() }}" />
                                        <x-com-konsumen.td-action>
                                            <a href="{{ url('konsumen/transaksi/show', $item->kode_transaksi) }}" class="px-3 py-2 bg-emerald-500 inline-flex gap-x-2 items-center rounded-md hover:bg-emerald-700">
                                                <i class="bi bi-eye text-white"></i>
                                                <span class="text-sm text-white uppercase">Detail</span>
                                            </a>
                                        </x-com-konsumen.td-action>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-com-konsumen.table>


                </div>
            </div>
        </div>
        <!-- End Grid -->
    </div>
</x-com-konsumen.app>

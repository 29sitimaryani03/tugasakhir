<x-app>
    @foreach ($list as $produk)
    @endforeach

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="uppercase text-base text-slate-800">DETAIL PRODUK</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- Bagian Gambar -->
                                <div class="col-md-6">
                                    <div class="w-full h-[250px] overflow-hidden flex flex-row">
                                        <!-- Gambar Utama -->
                                        <img src="{{ url('public') }}/{{ $produk->thumbnail_produk }}" alt=""
                                            style="max-height: 300px; flex: 1; margin-right: 10px;">
                                        <!-- Galeri Gambar -->
                                        <div class="flex flex-col justify-between">
                                            @foreach ($produk->galeri as $galeri)
                                                <img src="{{ url('public') }}/{{ $galeri->gambar }}" alt="Gambar Produk"
                                                    style="max-height: 80px; margin-top:10px; ">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- Bagian Deskripsi -->
                                <div class="col-md-6 mt-4 mt-md-0">
                                    <ul class="flex flex-col">
                                        <!-- Nama Produk -->
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Nama
                                                Produk</span>
                                            <span>:</span>
                                            <span>{{ $produk->nama_produk }}</span>
                                        </li>
                                        <!-- Harga Produk -->
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Harga
                                                Produk</span>
                                            <span>:</span>
                                            <span>{{ $produk->rupiah() }}</span>
                                        </li>
                                        <!-- Berat Produk -->
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Berat
                                                Produk</span>
                                            <span>:</span>
                                            <span>{{ $produk->berat_produk }}</span>
                                        </li>
                                        <!-- Stok Produk -->
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Stok</span>
                                            <span>:</span>
                                            <span>{{ $produk->stok_produk }}</span>
                                        </li>
                                        <!-- Varian Produk -->
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-400">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Varian</span>
                                            <span>:</span>
                                            <span>{{ $produk->varian_produk }}</span>
                                        </li>
                                        <!-- Rasa Produk -->
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-400">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Rasa</span>
                                            <span>:</span>
                                            <span>{{ $produk->varian_rasa }}</span>
                                        </li>
                                        <!-- Deskripsi Produk -->
                                        <li class="flex flex-col gap-3 py-2 border-b border-b-slate-400">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Deskripsi</span>
                                            <span>{!! $produk->deskripsi_produk !!}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tombol Kembali -->
                            <div class="mt-4" style="display: flex; justify-content: flex-end;">
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>

<x-com-admin.base>
    @foreach ($list as $produk) @endforeach
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="uppercase text-base text-slate-800">DETAIL PRODUK </h1>
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
                                <div class="col-md-4">
                                    <div class="w-full h-[250px]  overflow-hidden">
                                        <img src="{{ url('public') }}/{{ $produk->thumbnail_produk }}" alt="" class="w-full h-full">
                                    </div>
                                    <div class="grid grid-cols-3 gap-3 mt-6">
                                        @foreach ($produk->galeri as $galeri)
                                        <div>
                                            <img src="{{ url('public') }}/{{ $galeri->gambar }}" alt="asasa" class="w-full h-[100px]">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <ul class="flex flex-col">
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Nama Produk</span>
                                            <span>:</span>
                                            <span>{{ $produk->nama_produk }}</span>
                                        </li>
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Harga Produk</span>
                                            <span>:</span>
                                            <span>{{ $produk->rupiah() }}</span>
                                        </li>
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Berat Produk</span>
                                            <span>:</span>
                                            <span>{{ $produk->berat_produk }}</span>
                                        </li>
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-200">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Stok</span>
                                            <span>:</span>
                                            <span>{{ $produk->stok_produk }}</span>
                                        </li>
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-400">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Varian </span>
                                            <span>:</span>
                                            <span>{{ $produk->varian_produk }}</span>
                                        </li>
                                        <li class="flex items-center gap-3 py-2 border-b border-b-slate-400">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Rasa </span>
                                            <span>:</span>
                                            <span>{{ $produk->varian_rasa }}</span>
                                        </li>
                                        <li class="flex flex-col gap-3 py-2 border-b border-b-slate-400">
                                            <span class="w-[20%] font-medium text-base text-slate-600">Deskripsi </span>
                                            <span>{!! $produk->deskripsi_produk !!}</span>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</x-com-admin.base>

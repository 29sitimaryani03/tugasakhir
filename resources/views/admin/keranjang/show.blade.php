<x-com-admin.base>
    @foreach ($list as $k) @endforeach
    @php
        $totalHarga = 0;
    @endphp
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="uppercase text-base text-slate-800">DETAIL KERANJANG </h1>
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
                                <div class="col-md-5">
                                    <table class="table">
                                        <tr>
                                            <th>Kode</th>
                                            <td>:</td>
                                            <td>{{ $k->kode_keranjang }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal</th>
                                            <td>:</td>
                                            <td>{{ $k->tglIndo().' | '.$k->jamIndo() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Konsumen</th>
                                            <td>:</td>
                                            <td>{{ $k->konsumen->nama }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-12">
                                   <form action="{{ url('admin/keranjang/checkout') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_konsumen" value="{{ $k->konsumen->id }}">
                                        <input type="hidden" name="kode_keranjang" value="{{ $k->kode_keranjang }}">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <x-table.th label="Pilih" />
                                                    <x-table.th label="No." />
                                                    <x-table.th label="Produk" />
                                                    <x-table.th label="Harga" />
                                                    <x-table.th label="Varian" />
                                                    <x-table.th label="Rasa" />
                                                    <x-table.th label="Action" />
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($list as $produk)

                                                <tr>
                                                    <x-table.td-action>
                                                        <input type="checkbox" name="id_produk[]" value="{{ $produk->produk->id }}">
                                                    </x-table.td-action>
                                                    <x-table.td label=" {{ $loop->iteration }}" />
                                                    <x-table.td-action>
                                                        <img src="{{ url('public') }}/{{ $produk->produk->thumbnail_produk }}" alt="" class="w-[60px] h-[60px]">
                                                        <span>{{ $produk->produk->nama_produk }}</span>
                                                    </x-table.td-action>
                                                    <x-table.td label="{{ $produk->produk->harga_produk }}" />
                                                    <x-table.td label="{{ $produk->produk->varian_produk }}" />
                                                    <x-table.td label="{{ $produk->produk->varian_rasa }}" />
                                                    <x-table.td-action>
                                                        <div class="btn-group">
                                                            <a href="#" class="btn btn-danger">
                                                                <i class="bi bi-trash"></i>
                                                            </a>
                                                        </div>
                                                    </x-table.td-action>
                                                </tr>
                                                @php
                                                    $totalHarga += $produk->jumlah_harga; // Menambahkan nilai jumlah_harga ke total harga
                                                @endphp
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5">
                                                        <button type="submit" class="btn btn-success bg-green-500 focus:bg-green-600">CHEKOUT</button>
                                                    </td>
                                                    <td colspan="2">
                                                        <div class="flex items-center justify-end gap-3">
                                                            <span class="font-medium text-slate-600">TOTAL</span>
                                                            <span>:</span>
                                                            <span class="text-xl font-bold text-sky-500">{{ $totalHarga }}</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                   </form>
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

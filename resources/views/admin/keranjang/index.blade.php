<x-com-admin.base>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Keranjang Belanja </h1>
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
                        <div class="card-header">
                            <div class="flex items-center justify-end ">
                                <a href="{{ url('admin/keranjang/create') }}" class="btn btn-success">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah Data</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-table.table>
                                <thead>
                                    <tr>
                                        <x-table.th label="No." />
                                        <x-table.th label="Kode" />
                                        <x-table.th label="Pelanggan" />
                                        <x-table.th label="Jumlah Barang" />
                                        <x-table.th label="Total Harga" />
                                        <x-table.th label="Action" />
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $keranjang)
                                    <tr>
                                        <x-table.td label=" {{ $loop->iteration }}" />
                                        <x-table.td label="{{ $keranjang->kode_keranjang }}" />
                                        <x-table.td label="{{ $keranjang->konsumen->nama }}" />
                                        <x-table.td label="{{ $keranjang->jumlah_produk }}" />
                                        <x-table.td label="{{ $keranjang->total_harga }}" />
                                        <x-table.td-action>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/keranjang/show', $keranjang->kode_keranjang  ) }}" class="btn btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="#" class="btn btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </x-table.td-action>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </x-table.table>
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

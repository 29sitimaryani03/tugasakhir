<x-com-admin.base>
    <!-- Content Header (Page header) -->
    <x-slot name="header">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Transaksi</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </x-slot>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="flex items-center justify-end">
                                <a href="{{ url('admin/transaksi/create') }}" class="btn btn-success">
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
                                        <x-table.th label="Kode Transaksi" />
                                        <x-table.th label="Banyak Produk" />
                                        <x-table.th label="Jumlah Harga" />
                                        <x-table.th label="Metode Pembayaran" />
                                        <x-table.th label="Bukti Pembayaran" />
                                        <x-table.th label="Status Transaksi" />
                                        <x-table.th label="Action" />
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $transaksi)
                                    <tr>
                                        <x-table.td label="{{ $loop->iteration }}" />

                                        <x-table.td label="{{ $transaksi->kode_transaksi}}" />
                                        <x-table.td label="{{ $transaksi->banyak_produk}}" />
                                        <x-table.td label="{{ $transaksi->jumlah_harga }}" />
                                        <!-- Tambahkan kolom untuk Metode Pembayaran dan Bukti Pembayaran sesuai kebutuhan -->
                                        <x-table.td label="{{ $transaksi->metode_pembayaran }}" />
                                        <x-table.td label="{{ $transaksi->bukti_pembayaran }}" />
                                        <x-table.td label="{{ $transaksi->status_transaksi }}" />
                                        <x-table.td-action>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/transaksi/show', $transaksi->id) }}" class="btn btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ url('admin/transaksi/edit', $transaksi->id) }}" class="btn btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#delete{{ $transaksi->id }}" data-toggle="modal" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </x-table.td-action>
                                    </tr>

                                    <x-modal.modal-delete id="delete{{ $transaksi->id }}" url="{{ url('admin/transaksi/delete', $transaksi->id) }}" />
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

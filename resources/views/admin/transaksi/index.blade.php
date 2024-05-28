<x-app>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DATA TRANSAKSI
                </h5>
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
                            <a href="{{ url('admin/transaksi/create') }}" class="float-right btn btn-dark"><i
                                    class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Kode Transaksi</th>
                                    <th style="color: dark;" class="text-center">Banyak Produk</th>
                                    <th style="color: dark;" class="text-center">Jumlah Harga</th>
                                    <th style="color: dark;" class="text-center">Metode Pembayaran</th>
                                    <th style="color: dark;" class="text-center">Bukti Pembayaran</th>
                                    <th style="color: dark;" class="text-center">Status Transaksi</th>
                                    <th style="color: dark;" width="90px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($list as $transaksi)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $transaksi->kode_transaksi }}</td>
                                            <td class=" text-center">{{ $transaksi->banyak_produk }}</td>
                                            <td class="text-center">Rp. {{ number_format($transaksi->jumlah_harga) }}
                                            </td>
                                            <td class="text-center">{{ $transaksi->metode_pembayaran }}</td>
                                            <td class="text-center">{{ $transaksi->bukti_pembayaran }}</td>
                                            <td class="text-center">{{ $transaksi->status_transaksi }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <x-template.button.info-button url="admin/transaksi"
                                                        id="{{ $transaksi->id }}" />
                                                    <x-template.button.edit-button url="admin/transaksi"
                                                        id="{{ $transaksi->id }}" />
                                                    <x-template.button.delete-button url="admin/transaksi"
                                                        id="{{ $transaksi->id }}" />
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
</x-app>

<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DATA TRANSAKSI
                </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight: bold;">
                                PESANAN BARU
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Kode Transaksi</th>
                                    <th style="color: dark;" class="text-center">Nama Produk</th>
                                    <th style="color: dark;" class="text-center">Waktu Pesanan</th>
                                    <th style="color: dark;" class="text-center">Harga</th>
                                    <th style="color: dark;" class="text-center">Metode Pembayaran</th>
                                    <th style="color: dark;" class="text-center">Status</th>
                                    <th style="color: dark;" width="90px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($list as $transaksi)
                                    @if($transaksi->status_transaksi == 'Diproses')
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $transaksi->kode_transaksi }}</td>
                                        <td class="text-center">
                                            {{ $transaksi->items->pluck('produk.nama_produk')->implode(', ') }}
                                        </td>
                                        <td class=" text-center">{{$transaksi->created_at->diffForHumans()}}</td>
                                        <td class="text-center">Rp. {{number_format($transaksi->jumlah_harga)}}</td>
                                        <td class="text-center">{{ $transaksi->pembayaran->nama }}</td>
                                        <td class="text-center">
                                            @if($transaksi->status_transaksi === 'Diproses')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Pesanan Baru</span>
                                            @elseif($transaksi->status_transaksi === 'Dikirim')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-primary">Di Kirim</span>
                                            @elseif($transaksi->status_transaksi === 'Tiba di Tujuan')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-success">Tiba di Tujuan</span>
                                            @elseif($transaksi->status_transaksi === 'Ditolak')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-danger">Di Tolak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <!-- <x-template.button.edit-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <x-template.button.delete-button url="admin/transaksi" id="{{ $transaksi->id }}" /> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight: bold;">
                                PESANAN DIKIRIM
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Kode Transaksi</th>
                                    <th style="color: dark;" class="text-center">Nama Produk</th>
                                    <th style="color: dark;" class="text-center">Waktu Pesanan</th>
                                    <th style="color: dark;" class="text-center">Harga</th>
                                    <th style="color: dark;" class="text-center">Metode Pembayaran</th>
                                    <th style="color: dark;" class="text-center">Status</th>
                                    <th style="color: dark;" width="90px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($list as $transaksi)
                                    @if($transaksi->status_transaksi == 'Dikirim')
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $transaksi->kode_transaksi }}</td>
                                        <td class="text-center">
                                            {{ $transaksi->items->pluck('produk.nama_produk')->implode(', ') }}
                                        </td>
                                        <td class=" text-center">{{$transaksi->created_at->diffForHumans()}}</td>
                                        <td class="text-center">Rp. {{number_format($transaksi->jumlah_harga)}}</td>
                                        <td class="text-center">{{ $transaksi->pembayaran->nama }}</td>
                                        <td class="text-center">
                                            @if($transaksi->status_transaksi === 'Diproses')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Pesanan Baru</span>
                                            @elseif($transaksi->status_transaksi === 'Dikirim')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-primary">Di Kirim</span>
                                            @elseif($transaksi->status_transaksi === 'Tiba di Tujuan')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-success">Tiba di Tujuan</span>
                                            @elseif($transaksi->status_transaksi === 'Ditolak')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-danger">Di Tolak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <!-- <x-template.button.edit-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <x-template.button.delete-button url="admin/transaksi" id="{{ $transaksi->id }}" /> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight: bold;">
                                PESANAN TIBA DI TUJUAN
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example5" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Kode Transaksi</th>
                                    <th style="color: dark;" class="text-center">Nama Produk</th>
                                    <th style="color: dark;" class="text-center">Waktu Pesanan</th>
                                    <th style="color: dark;" class="text-center">Harga</th>
                                    <th style="color: dark;" class="text-center">Metode Pembayaran</th>
                                    <th style="color: dark;" class="text-center">Status</th>
                                    <th style="color: dark;" width="90px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($list as $transaksi)
                                    @if($transaksi->status_transaksi == 'Tiba Di Tujuan')
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $transaksi->kode_transaksi }}</td>
                                        <td class="text-center">
                                            {{ $transaksi->items->pluck('produk.nama_produk')->implode(', ') }}
                                        </td>
                                        <td class=" text-center">{{$transaksi->created_at->diffForHumans()}}</td>
                                        <td class="text-center">Rp. {{number_format($transaksi->jumlah_harga)}}</td>
                                        <td class="text-center">{{ $transaksi->pembayaran->nama }}</td>
                                        <td class="text-center">
                                            @if($transaksi->status_transaksi === 'Diproses')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Pesanan Baru</span>
                                            @elseif($transaksi->status_transaksi === 'Dikirim')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-primary">Di Kirim</span>
                                            @elseif($transaksi->status_transaksi === 'Tiba di Tujuan')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-success">Tiba di Tujuan</span>
                                            @elseif($transaksi->status_transaksi === 'Ditolak')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-danger">Di Tolak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <!-- <x-template.button.edit-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <x-template.button.delete-button url="admin/transaksi" id="{{ $transaksi->id }}" /> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight: bold;">
                                PESANAN DI TOLAK
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Kode Transaksi</th>
                                    <th style="color: dark;" class="text-center">Nama Produk</th>
                                    <th style="color: dark;" class="text-center">Waktu Pesanan</th>
                                    <th style="color: dark;" class="text-center">Harga</th>
                                    <th style="color: dark;" class="text-center">Metode Pembayaran</th>
                                    <th style="color: dark;" class="text-center">Status</th>
                                    <th style="color: dark;" width="90px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($list as $transaksi)
                                    @if($transaksi->status_transaksi == 'Ditolak')
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $transaksi->kode_transaksi }}</td>
                                        <td class="text-center">
                                            {{ $transaksi->items->pluck('produk.nama_produk')->implode(', ') }}
                                        </td>
                                        <td class=" text-center">{{$transaksi->created_at->diffForHumans()}}</td>
                                        <td class="text-center">Rp. {{number_format($transaksi->jumlah_harga)}}</td>
                                        <td class="text-center">{{ $transaksi->pembayaran->nama }}</td>
                                        <td class="text-center">
                                            @if($transaksi->status_transaksi === 'Diproses')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Pesanan Baru</span>
                                            @elseif($transaksi->status_transaksi === 'Dikirim')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-primary">Di Kirim</span>
                                            @elseif($transaksi->status_transaksi === 'Tiba di Tujuan')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-success">Tiba di Tujuan</span>
                                            @elseif($transaksi->status_transaksi === 'Ditolak')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-danger">Di Tolak</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <!-- <x-template.button.edit-button url="admin/transaksi" id="{{ $transaksi->id }}" />
                                                <x-template.button.delete-button url="admin/transaksi" id="{{ $transaksi->id }}" /> -->
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app>
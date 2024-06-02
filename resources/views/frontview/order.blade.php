<x-base>
    <div class="page-header text-center" style="background-image: url('{{url('public')}}/front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Data Pesanan</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <table id="example2" class="table table-bordered">
                    <thead class="bg-dark">
                        <tr>
                            <th style="color: white;" width="35px" class="text-center">No.</th>
                            <th class="text-center" style="color: white;">Kode Transaksi</th>
                            <th class="text-center" style="color: white;">Nama Produk</th>
                            <th class="text-center" style="color: white;">Tanggal Pesanan</th>
                            <th class="text-center" style="color: white;">Kuantitas</th>
                            <th class="text-center" style="color: white;">Harga</th>
                            <th class="text-center" style="color: white;">Pembayaran</th>
                            <th class="text-center" style="color: white;">Status</th>
                            <!-- <th class="text-center" style="color: white;">Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_pesan as $pesan)
                        @if($pesan->id_pembayaran !== null && $pesan->id_pembayaran != 0 && $pesan->status_transaksi !== null)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{ $pesan->kode_transaksi }}</td>
                            <td class="text-center">
                                {{ $pesan->items->pluck('produk.nama_produk')->implode(', ') }}
                            </td>
                            <td class="text-center">{{$pesan->created_at->diffForHumans()}}</td>
                            <td class="text-center">{{$pesan->banyak_produk}} pcs</td>
                            <td class="text-center">Rp. {{number_format($pesan->jumlah_harga)}}</td>
                            <td class="text-center">{{ $pesan->pembayaran->nama }}</td>
                            <td class="text-center">
                                @if($pesan->status_transaksi === 'Menunggu Konfirmasi')
                                <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Menunggu Konfirmasi</span>
                                @elseif($pesan->status_transaksi === 'Diproses')
                                <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Di Proses..</span>
                                @elseif($pesan->status_transaksi === 'Dikirim')
                                <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-primary">Di Kirim</span>
                                @elseif($pesan->status_transaksi === 'Tiba di Tujuan')
                                <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-success">Tiba di Tujuan</span>
                                @elseif($pesan->status_transaksi === 'Di Tolak')
                                <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-danger">Di Tolak</span>
                                @endif
                            </td>
                            <!-- <td>
                                        <form action="{{ url('pesan', $pesan->id) }}" method="POST" class="form-inline" onsubmit="return confirm('Yakin Akan Membatalkan Pesanan Ini?')">
                                            @csrf
                                            @method("delete")
                                            <button class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td> -->
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-base>
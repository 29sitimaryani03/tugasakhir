<x-base>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="checkout-title">Data Pesanan</h2>
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table class="table table-datatable">
                            <thead>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Tanggal Pesanan</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach($list_pesan as $pesan)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $pesan->produk->nama_produk }}</td>
                                    <td>{{$pesan->created_at->diffForHumans()}}</td>
                                    <td>{{$pesan->banyak_produk}} pcs</td>
                                    <td>Rp. {{number_format($pesan->jumlah_harga)}}</td>
                                    <td>{{ $pesan->metode_pembayaran }}</td>
                                    <td>{{$pesan->status_transaksi}}</td>
                                    <td>
                                        <form action="{{ url('pesan', $pesan->id) }}" method="POST" class="form-inline" onsubmit="return confirm('Yakin Akan Membatalkan Pesanan Ini?')">
                                            @csrf
                                            @method("delete")
                                            <button class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> DETAIL DATA TRANSAKSI
                </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('admin/transaksi') }}" class="btn btn-primary btn-tone btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight: bold;">
                                INFORMASI PEMBELI
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('kajur/cuti', $transaksi->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">NAMA</dt>
                                        <dd>{{ $transaksi->user->nama }}</dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">EMAIL</dt>
                                        <dd>{{ $transaksi->user->email }}</dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">NO. HANDPHONE</dt>
                                        <dd>{{ $transaksi->user->no_hp }}</dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">ALAMAT PENGIRIMAN</dt>
                                        <dd>{{$transaksi->alamat}}</dd>
                                    </div>
                                </div>
                                <br>
                                @if ($transaksi->status_kj == 'SETUJUI')
                                <a href="{{ url('kajur/cetak_cuti/word-export2', $transaksi->id) }}" target="_blank" class="text-white btn btn-block btn-dark col-md-2">
                                    <span><i class="fas fa-download"></i> Download Dokumen</span>
                                </a>
                                @endif
                                @if ($transaksi->status_kj == 'PERUBAHAN')
                                <a href="{{ url('kajur/cetak_cuti/word-export2', $transaksi->id) }}" target="_blank" class="text-white btn btn-block btn-dark col-md-2">
                                    <span><i class="fas fa-download"></i> Download Dokumen</span>
                                </a>
                                @endif
                                @if ($transaksi->status_kj == 'DITANGGUHKAN')
                                <a href="{{ url('kajur/cetak_cuti/word-export2', $transaksi->id) }}" target="_blank" class="text-white btn btn-block btn-dark col-md-2">
                                    <span><i class="fas fa-download"></i> Download Dokumen</span>
                                </a>
                                @endif

                                @if ($transaksi->status_kj == 'TIDAK DISETUJUI')
                                <a href="{{ url('kajur/cetak_cuti/word-export2', $transaksi->id) }}" target="_blank" class="text-white btn btn-block btn-dark col-md-2">
                                    <span><i class="fas fa-download"></i> Download Dokumen</span>
                                </a>
                                @endif
                            </form>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title" style="font-weight: bold;">
                                INFORMASI PESANAN
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('admin/transaksi', $transaksi->id) }}" method="post">
                                @csrf
                                @method("PUT")
                                <div class="row">
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">KODE TRANSAKSI</dt>
                                        <dd>{{ $transaksi->kode_transaksi }}</dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">STATUS</dt>
                                        <dd>
                                            @if($transaksi->status_transaksi === 'Diproses')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-warning">Pesanan Baru</span>
                                            @elseif($transaksi->status_transaksi === 'Dikirim')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-primary">Di Kirim</span>
                                            @elseif($transaksi->status_transaksi === 'Tiba di Tujuan')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-success">Tiba di Tujuan</span>
                                            @elseif($transaksi->status_transaksi === 'Ditolak')
                                            <span style="font-size: 15px; color: white;" class="font-weight-bold badge bg-danger">Di Tolak</span>
                                            @endif
                                        </dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">METODE PEMBAYARAN</dt>
                                        <dd>{{ $transaksi->pembayaran->nama }}</dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">WAKTU PEMESANAN</dt>
                                        <dd>{{$transaksi->created_at->diffForHumans()}}</dd>
                                    </div>
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">PRODUK YANG DI PESAN</dt>
                                        <dd>
                                            <ul>
                                                @foreach($transaksi->items as $item)
                                                <li>
                                                    <strong>{{ $item->produk->nama_produk }}</strong>
                                                    <ul>
                                                        <li>
                                                            <img src="{{ url('public') }}/{{ $item->produk->thumbnail_produk }}" alt="{{ $item->produk->nama_produk }}" style="width: 50px; height: auto; cursor: pointer;" data-toggle="modal" data-target="#productModal" onclick="showImage('{{ url('public') }}/{{ $item->produk->thumbnail_produk }}')">
                                                        </li>
                                                        <li>Jumlah: {{ $item->jumlah_produk }} pcs</li>
                                                        <li>Varian Produk: {{ $item->produk->varian_produk }}</li>
                                                        <li>Varian Rasa: {{ $item->produk->varian_rasa }}</li>
                                                        <li>Total Harga: Rp. {{ number_format($item->harga_produk) }}</li>
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </dd>
                                    </div>
                                    @if($transaksi->pembayaran->nama !== 'CASH ON DELIVERY')
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">BUKTI PEMBAYARAN</dt>
                                        @if($transaksi->bukti_pembayaran)
                                        <div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#previewModal">Lihat Bukti Pembayaran</button>
                                        </div>
                                        @else
                                        <dd>Tidak ada bukti pembayaran yang diunggah.</dd>
                                        @endif
                                    </div>
                                    @endif
                                    <div class="col-md-6">
                                        <dt class="font-weight-bold">PESAN DARI PEMBELI</dt>
                                        <textarea name="keterangan" id="deskripsi" class="form-control" readonly>{{ $transaksi->pesan ?? 'N/A' }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group float-right">
                                            @if($transaksi->status_transaksi == 'Diproses')
                                            <button class="btn btn-primary btn-tone" name="status_transaksi" value="Dikirim"><span class="fas fa-box"></span> Kirim</button>
                                            <!-- <button class="btn btn-success  btn-tone" name="status_transaksi" value="Tiba Di Tujuan"><span class="fas fa-box-open"></span> Tiba Di Tujuan</button> -->
                                            <button class="btn btn-danger btn-tone" name="status_transaksi" value="Ditolak"><span class="fa fa-times"></span> Tolak</button>
                                            @endif
                                            @if($transaksi->status_transaksi == 'Dikirim')
                                            <!-- <button class="btn btn-primary btn-tone" name="status_transaksi" value="Dikirim"><span class="fas fa-box"></span> Kirim</button> -->
                                            <button class="btn btn-success  btn-tone" name="status_transaksi" value="Tiba Di Tujuan"><span class="fas fa-box-open"></span> Tiba Di Tujuan</button>
                                            <!-- <button class="btn btn-danger btn-tone" name="status_transaksi" value="Ditolak"><span class="fa fa-times"></span> Tolak</button> -->
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="previewModal" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="previewModalLabel">Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{ url('public') }}/{{ $transaksi->bukti_pembayaran }}" class="img-fluid" alt="Bukti Pembayaran">
                    <hr>
                    <a href="{{ url('public') }}/{{ $transaksi->bukti_pembayaran }}" download="{{ $transaksi->kode_transaksi }}.jpg" class="btn btn-primary btn-download">Unduh</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Image -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Thumbnail Produk</h5>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</x-app>
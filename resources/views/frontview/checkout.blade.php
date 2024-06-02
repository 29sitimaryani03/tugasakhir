<x-base>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('public')}}/front/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">CheckOut</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <br>

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <form action="{{ url('transaksi', $transaction->kode_transaksi) }}" method="post">
                                @csrf
                                @method('PUT')
                                <label>Alamat *</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" required>
                                <label>Pembayaran</label>
                                <select name="id_pembayaran" class="form-control">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    @foreach($pembayaran as $p)
                                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>

                                <label>Tinggalkan Pesan (opsional)</label>
                                <textarea class="form-control" name="pesan" cols="30" rows="4" placeholder="Catatan tentang pesanan Anda, mis. catatan khusus untuk pengiriman"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-order">
                                    <span class="btn-text">Pesan</span>
                                    <span class="btn-hover-text">Proses CheckOut</span>
                                </button>
                            </form>
                        </div><!-- End .col-lg-9 -->

                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Ringkasan Belanja</h3>
                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transaction->items as $item)
                                        <tr>
                                            <td><a href="{{ url('product', $item->produk->id) }}">{{ $item->produk->nama_produk }}</a></td>
                                            <td class="text-center">{{ $item->jumlah_produk }}</td>
                                            <td>Rp. {{ number_format($item->harga_produk) }}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td class="text-center"></td>
                                            <td>Rp. {{ number_format($transaction->jumlah_harga) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
</x-base>
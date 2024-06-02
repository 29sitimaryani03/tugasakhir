<x-base>
    <main class="main">
        <div class="page-header text-center" style="background-image: url('{{url('public')}}/front/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Preview<span>Transaksi</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <br>
        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="contact-box">
                                <div class="col-md-12">
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" style="font-weight:bold; font-size: 16px; border-bottom: 3px solid #ff7843;">No Pesanan</label>
                                                <br>
                                                <span onclick="copyToClipboard('{{ $transaction->kode_transaksi }}')" style="cursor: pointer;" style="font-size: 15px;">{{ $transaction->kode_transaksi }} <i class="fas fa-copy"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" style="font-weight:bold; font-size: 16px; border-bottom: 3px solid #ff7843;">Metode Pembayaran</label>
                                                <br>
                                                <span style="font-size: 15px;">{{ $transaction->pembayaran->nama }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-4">
                                                <label class="form-label" style="font-weight:bold; font-size: 16px; border-bottom: 3px solid #ff7843;">No. Tujuan Pembayaran</label>
                                                <br>
                                                <span onclick="copyToClipboard('{{ $transaction->pembayaran->no }}')" style="cursor: pointer;" style="font-size: 15px;"><i class="fas fa-copy">{{ $transaction->pembayaran->no }}</i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ url('transaksi2', $transaction->kode_transaksi) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="form-label mb-3" style="font-weight: bold;font-size: 16px; border-bottom: 3px solid #ff7843;">Unggah Bukti Pembayaran</label>
                                    <input type="file" class="form-control" id="proofOfPayment" name="bukti_pembayaran" required>
                                </div>
                                <p style="font-weight: semibold;">*Pastikan data transaksi sudah benar. Kesalahan input data bukan tanggung jawab kami.</p>
                                <hr>
                                <button type="submit" class="btn btn-outline-primary-2 btn-order">
                                    <span class="btn-text">Selesai</span>
                                    <span class="btn-hover-text">Proses Selesai</span>
                                </button>
                            </form>
                            <!-- <form action="{{ url('transaksi', $transaction->kode_transaksi) }}" method="post">
                                @csrf
                                @method('PUT')
                                <label>Alamat *</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap" required>
                                <label>Pembayaran</label>
                                <select name="metode_pembayaran" class="form-control">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="Cash On Delivery">Cash On Delivery</option>
                                    <option value="Transfer">Transfer</option>
                                </select>

                                <label>Tinggalkan Pesan (optional)</label>
                                <textarea class="form-control" name="pesan" cols="30" rows="4" placeholder="Catatan tentang pesanan Anda, mis. catatan khusus untuk pengiriman"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-order">
                                    <span class="btn-text">Pesan</span>
                                    <span class="btn-hover-text">Proses CheckOut</span>
                                </button>
                            </form> -->
                        </div>

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
                        </aside>
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
</x-base>
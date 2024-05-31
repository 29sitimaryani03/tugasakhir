<x-base>
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <form action="{{ url('pesan') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">CheckOut</h2>

                                <label>Alamat *</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat Lengkap"
                                    required>
                                <input type="hidden" name="id_produk" value="{{ $cart->id_produk }}">
                                <input type="hidden" name="banyak_produk" value="{{ $cart->banyak_produk }}">
                                <input type="hidden" name="jumlah_harga" value="{{ $cart->jumlah_harga }}">

                                <label>Pembayaran</label>
                                <select name="metode_pembayaran" class="form-control">
                                    <option value="">Pilih Metode Pembayaran</option>
                                    <option value="Alfamart">Alfamart</option>
                                    <option value="Indomaret">Indomaret</option>
                                    <option value="Cash On Delivery">Cash On Delivery</option>
                                    <option value="Transfer">Transfer</option>
                                    <option value="Bayar Langsung">Bayar Langsung</option>
                                </select>

                                <label>Tinggalkan Pesan (optional)</label>
                                <textarea class="form-control" name="pesan" cols="30" rows="4"
                                    placeholder="Catatan tentang pesanan Anda, mis. catatan khusus untuk pengiriman"></textarea>
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
                                            <tr>
                                                <td><a
                                                        href="{{ url('product', $cart->id_produk) }}">{{ $cart->produk->nama_produk }}</a>
                                                </td>
                                                <td class="text-center">{{ $cart->banyak_produk }}</td>
                                                <td>Rp. {{ number_format($cart->jumlah_harga) }}</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td class="text-center"></td>
                                                <td>Rp. {{ number_format($cart->jumlah_harga) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="harga" value="{{ $cart->harga }}">
                                    <input type="hidden" name="nama_produk" value="{{ $cart->nama }}">
                                    <input type="hidden" name="produk_id" value="{{ $cart->id }}">
                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Pesan</span>
                                        <span class="btn-hover-text">Proses CheckOut</span>
                                    </button>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
</x-base>

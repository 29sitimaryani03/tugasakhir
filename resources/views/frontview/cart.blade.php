<x-base>
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-cart table-mobile col-md-15">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Kuantitas</th>
                                    <th>Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($list_cart as $cart)
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ url('product', $cart->id_produk) }}">
                                                    @if($cart->produk)
                                                    <img src="{{ url('public') }}/{{ $cart->produk->thumbnail_produk }}" alt="Product image">
                                                    @else
                                                    <img src="{{ url('public/default.png') }}" alt="Default product image"> <!-- Default image if product is null -->
                                                    @endif
                                                </a>
                                            </figure>
                                            <h3 class="product-title">
                                                <a href="{{ url('product', $cart->id_produk) }}">{{ $cart->produk ? $cart->produk->nama_produk : 'Product not found' }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col-md-10">Rp.{{ number_format($cart->produk->harga_produk) }}</td>
                                    <td class="quantity-col">
                                        <div class="cart-product-quantity">
                                            <input type="number" class="form-control" value="{{ $cart->banyak_produk }}" min="1" max="10" step="1" data-decimals="0" required>
                                        </div><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">Rp.{{ number_format($cart->produk->harga_produk * $cart->banyak_produk) }}
                                    <td><a href="{{ url('checkout', $cart->id) }}" class="btn btn-outline-primary-2 btn-order ml-5 mr-0">BELI</a></td>
                                    <td>
                                        <form action="{{ url('cart', $cart->id) }}" method="POST" class="form-inline" onsubmit="return confirm('Yakin Akan Menghapus Data Ini')">
                                            @csrf
                                            @method("delete")
                                            <button class="btn-remove"><i class="icon-close"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Keranjang Anda Masih Kosong</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <a href="{{ url('shop') }}" class="btn btn-outline-dark-2"><span>Lanjut Belanja</span><i class="icon-refresh"></i></a>
                        </div><!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div>
</x-base>
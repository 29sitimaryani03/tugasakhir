<x-base>
    <div class="page-header text-center" style="background-image: url('{{url('public')}}/front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Keranjang</h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <br>
    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ url('toCheckout') }}" method="post">
                            @csrf
                            <table class="table table-cart table-mobile col-md-15">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Kuantitas</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($list_cart as $cart)
                                    <tr id="cart-item-{{ $cart->id }}">
                                        <td>
                                            <input type="checkbox" name="selected_products[]" value="{{ $cart->id }}" {{ $cart->produk && $cart->produk->stok_produk == 0 ? 'disabled' : '' }}>
                                        </td>
                                        <input type="hidden" name="id_produk" value="{{ $cart->id_produk }}">
                                        <td class="product-col">
                                            <div class="product">
                                                <figure class="product-media">
                                                    <a href="{{ url('product', $cart->id_produk) }}">
                                                        @if ($cart->produk)
                                                        <img src="{{ url('public') }}/{{ $cart->produk->thumbnail_produk }}" alt="Product image">
                                                        @else
                                                        <img src="{{ url('public/default.png') }}" alt="Default product image">
                                                        @endif
                                                    </a>
                                                </figure>
                                                <h3 class="product-title">
                                                    <a href="{{ url('product', $cart->id_produk) }}">{{ $cart->produk ? $cart->produk->nama_produk : 'Product not found' }}</a>
                                                </h3>
                                            </div>
                                        </td>
                                        <td class="price-col-md-10">
                                            @if ($cart->produk)
                                            Rp.{{ number_format($cart->produk->harga_produk) }}
                                            @else
                                            Rp.0
                                            @endif
                                        </td>
                                        <td class="quantity-col">
                                            <div class="cart-product-quantity">
                                                @if ($cart->produk && $cart->produk->stok_produk > 0)
                                                <p type="number" class="form-control text-center" value="{{ $cart->banyak_produk }}" min="1" max="10" step="1" data-decimals="0" required>{{ $cart->banyak_produk }}</p>
                                                @else
                                                <span class="text-danger">Stok Habis</span>
                                                @endif
                                            </div>
                                        </td>
                                        <td class="total-col">
                                            @if ($cart->produk)
                                            Rp.{{ number_format($cart->produk->harga_produk * $cart->banyak_produk) }}
                                            @else
                                            Rp.0
                                            @endif
                                        </td>
                                        <td class="remove-col">
                                            <a href="{{ url('cart', $cart->id) }}" class="btn-remove" onclick="event.preventDefault(); document.getElementById('remove-form-{{ $cart->id }}').submit();">
                                                <i class="icon-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Keranjang Anda Masih Kosong</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="cart-bottom">
                                <button type="submit" class="btn btn-outline-primary-2"><span>Checkout Yang Dipilih</span></button>
                                <a href="{{ url('shop') }}" class="btn btn-outline-dark-2"><span>Lanjut Belanja</span><i class="icon-refresh"></i></a>
                            </div>
                        </form>

                        @foreach($list_cart as $cart)
                        <form id="remove-form-{{ $cart->id }}" action="{{ url('cart', $cart->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base>
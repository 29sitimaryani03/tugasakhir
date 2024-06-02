<x-base>

    <div class="page-header text-center" style="background-image: url('{{url('public')}}/front/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Produk<span>Amplang Kite</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <br>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery product-gallery-vertical">
                            <div class="row">
                                <figure class="product-main-image">
                                    <img id="product-zoom" src="{{ url('public') }}/{{ $produk->galeri[0]->gambar }}" alt="product image">
                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery" data-toggle="modal" data-target="#productModal">
                                        <i class="icon-arrows"></i>
                                    </a>
                                </figure>
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($produk->galeri as $carousel)
                                    <a href="#" class="mb-1" data-image="{{ url('public') }}/{{ $carousel->gambar }}" data-zoom-image="{{ url('public') }}/{{ $carousel->gambar }}">
                                        <img src="{{ url('public') }}/{{ $carousel->gambar }}" alt="product side">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $produk->nama_produk }}</h1>
                            <div class="product-price">
                                Rp. {{ number_format($produk->harga_produk) }}
                            </div>

                            <div class="row">
                                <label class="mr-5">Berat</label>
                                <p>: {{ $produk->berat_produk }} gr</p>
                            </div>

                            <div class="row">
                                <label class="mr-5">Stok</label>
                                <p>: {{ $produk->stok_produk == 0 ? 'Stok Kosong' : $produk->stok_produk . ' pcs' }}</p>
                            </div>

                            <div class="row">
                                <label class="mr-5">Varian Produk</label>
                                <p>: {{ $produk->varian_produk }}</p>
                            </div>

                            <div class="row">
                                <label class="mr-5">Varian Rasa</label>
                                <p>: {{ $produk->varian_rasa }}</p>
                            </div>
                            <br>
                            <form action="{{ url('add_to_cart') }}" method="post">
                                @csrf
                                <div class="details-filter-row details-row-size">
                                    <label for="qty">Qty:</label>
                                    <div class="product-details-quantity">
                                        <input type="number" id="qty" name="banyak_produk" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                    </div><!-- End .product-details-quantity -->
                                    <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                    <input type="hidden" name="harga_produk" value="{{ $produk->harga_produk }}">
                                </div>
                                <div class="product-details-action-container">
                                    <div class="product-details-action">
                                        <button class="btn btn-product btn-cart" {{ $produk->stok_produk == 0 ? 'disabled' : '' }}>
                                            <span>Tambah Keranjang</span>
                                        </button>
                                        <div class="product-details-action m-3">
                                            <button class="btn btn-outline-primary-2 btn-order " {{ $produk->stok_produk == 0 ? 'disabled' : '' }}>
                                                BELI
                                            </button>
                                        </div><!-- End .product-details-action -->
                                    </div><!-- End .product-details-action -->
                                </div><!-- End .product-details-action-container -->
                            </form>
                            <div class="product-details-footer">
                                <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div>
                    </div>

                </div>
            </div>
            <div class="product-details-tab">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">DESKRIPSI PRODUK</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                        <div class="product-desc-content">
                            {!! $produk->deskripsi_produk !!}
                        </div><!-- End .product-desc-content -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->

    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <img id="modalImage" src="" class="img-fluid" alt="Product image">
                </div>
            </div>
        </div>
    </div>

</x-base>
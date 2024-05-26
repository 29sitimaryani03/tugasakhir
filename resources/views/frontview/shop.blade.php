<x-base>
    <br>
    <br>
    <div class="page-content">
        <div class="container">
            <div class="toolbox">
                <div class="toolbox-left">
                    <a href="#" class="sidebar-toggler"><i class="icon-bars"></i>Filters</a>
                </div><!-- End .toolbox-left -->

                <div class="toolbox-right">
                    <div class="toolbox-sort">
                        <label for="sortby">Sort by:</label>
                        <div class="select-custom">
                            <select name="sortby" id="sortby" class="form-control">
                                <option value="popularity" selected="selected">Most Popular</option>
                                <option value="rating">Most Rated</option>
                                <option value="date">Date</option>
                            </select>
                        </div>
                    </div><!-- End .toolbox-sort -->
                </div><!-- End .toolbox-right -->
            </div><!-- End .toolbox -->

            <div class="products">
                <div class="row">
                    @foreach ($list_produk as $produk)
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="product product-2">
                            <figure class="product-media">
                                <a href="{{ url('product', $produk->id) }}">
                                    <img src="{{ url('public', $produk->thumbnail_produk) }}" alt="Product image" class="product-image" style="height: 280px; object-fit: cover;">
                                    <img src="{{ url('public', $produk->thumbnail_produk) }}" alt="Product image" class="product-image-hover" style="height: 280px; object-fit: cover;">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action -->

                                <div class="product-action product-action-transparent">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <h3 class="product-title" style="font-size: large; font-weight:500;"><a href="{{url('product', $produk->id)}}">{{$produk->nama_produk}}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    Stok : {{$produk->stok_produk}}
                                </div><!-- End .product-price -->
                                <div class="product-price">
                                    Rp. {{number_format($produk->harga_produk)}}
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                    @endforeach
                </div><!-- End .row -->
                {{ $list_produk->links()}}
                <div class="load-more-container text-center">
                    <a href="#" class="btn btn-outline-darker btn-load-more">More Products <i class="icon-refresh"></i></a>
                </div><!-- End .load-more-container -->
            </div><!-- End .products -->

            <div class="sidebar-filter-overlay"></div><!-- End .sidebar-filter-overlay -->
            <aside class="sidebar-shop sidebar-filter">
                <div class="sidebar-filter-wrapper">
                    <div class="widget widget-clean">
                        <label><i class="icon-close"></i>Filter</label>
                    </div><!-- End .widget -->
                    <div class="widget widget-collapsible">
                        <form action="{{ url('shop/filter') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label">Nama produk</label>
                                <input type="text" class="form-control" name="nama" value="{{ $nama ?? '' }}">
                            </div>
                            <br>
                            <button class="btn btn-dark float-right"></i>Filter</button>
                        </form>

                    </div><!-- End .widget -->
                    <br>
                    <br>
                    <br>
                    <!-- <div class="widget widget-collapsible">
                        <form action="{{ url('shop/filter2') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="" class="control-label">Harga min</label>
                                <input type="number" class="form-control" name="harga_min" value="{{ $harga_min ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Harga Max</label>
                                <input type="number" class="form-control" name="harga_max" value="{{$harga_max ?? ''}}">
                            </div>
                            <br>
                            <button class="btn btn-dark float-right"></i>Filter</button>
                        </form>
                    </div>End .widget -->

                </div><!-- End .sidebar-filter-wrapper -->
            </aside><!-- End .sidebar-filter -->
        </div><!-- End .container -->
    </div>
</x-base>
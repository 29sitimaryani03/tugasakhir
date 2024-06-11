<x-app>
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header py-2">
                <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> TAMBAH DATA PRODUK
                </h5>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ url('admin/produk') }}" class="btn btn-primary btn-tone btn-sm"><i
                            class="fas fa-arrow-left"></i> Kembali</a>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/produk') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3 mb-4">
                                        <label for="" class="control-label">NAMA PRODUK</label>
                                        <input type="text" id="name" name="nama_produk" class="form-control"
                                            placeholder="Masukan Nama Produk" required>
                                        @error('nama_produk')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="" class="control-label">HARGA PRODUK</label>
                                        <input type="text" id="name" name="harga_produk" class="form-control"
                                            placeholder="Masukan Harga Produk" required>
                                        @error('harga_produk')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="" class="control-label">BERAT PRODUK</label>
                                        <input type="text" id="name" name="berat_produk" class="form-control"
                                            placeholder="Masukan Berat Produk" required>
                                        @error('berat_produk')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="" class="control-label">STOK PRODUK</label>
                                        <input type="number" id="name" name="stok_produk" class="form-control"
                                            placeholder="Masukan Stok Produk" required>
                                        @error('stok_produk')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label>VARIAN PRODUK</label>
                                        <select name="varian_produk" class="form-control">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Bulat">Bulat</option>
                                            <option value="Stik Potong">Stik Potong</option>
                                            <option value="Stik Tipis">Stik Tipis</option>
                                            <option value="Kapsul">Kapsul</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label>VARIAN RASA</label>
                                        <select name="varian_rasa" class="form-control">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Original">Original</option>
                                            <option value="Pedas">Pedas</option>
                                            <option value="Keju">Keju</option>
                                            <option value="Rumput Laut">Rumput Laut</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="" class="control-label">THUMBNAIL PRODUK</label>
                                        <input type="file" id="name" name="thumbnail_produk"
                                            class="form-control" placeholder="Masukan Thumbnail Produk" required>
                                        @error('thumbnail_produk')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label for="" class="control-label">GAMBAR PRODUK</label>
                                        <input type="file" id="name" name="gambar[]" class="form-control"
                                            placeholder="Masukan Gambar Produk" multiple required>
                                        @error('gambar[]')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label>DESKRIPSI PRODUK</label>
                                        <textarea class="form-control @error('deskripsi_produk') is-invalid @enderror" id="summernote"
                                            name="deskripsi_produk" id="summernote" cols="30" rows="7" placeholder="Masukan Deskripsi Produk"
                                            required></textarea>
                                        @error('deskripsi_produk')
                                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p
                                                style="font-size: 12px">
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary btn-tone float-right"><i
                                                class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @push('js')
        <script src="{{ asset('resources/js/jquery.inputmask.bundle.min.js') }}"></script>
        <script src="{{ asset('resources/js/rupiah.js') }}"></script>
    @endpush
</x-app>

<x-app>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2>FORM TAMBAH DATA PRODUK</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('admin/produk') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <x-input.input label="Nama produk" type="text" name="nama_produk"
                                            placeholder="Masukan nama produk ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Harga produk" type="text" id="rupiah"
                                            name="harga_produk" placeholder="Masukan harga produk ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Berat produk" type="text" name="berat_produk"
                                            placeholder="Ctx ('1 Pcs')..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Stok produk" type="number" name="stok_produk"
                                            placeholder="Masukan stok produk ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.select label="Varian Produk" name="varian_produk">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Bulat">Bulat</option>
                                            <option value="Stik Potong">Stik Potong</option>
                                            <option value="Stik Tipis">Stik Tipis</option>
                                            <option value="Kapsul">Kapsul</option>
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.select label="Varian Rasa" name="varian_rasa">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Original">Original</option>
                                            <option value="Pedas">Pedas</option>
                                            <option value="Keju">Keju</option>
                                            <option value="Rumput Laut">Rumput Laut</option>
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Thumbnail produk" type="file" name="thumbnail_produk"
                                            placeholder="Masukan thumbnail   produk ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Gambar produk" type="file" name="gambar[]" multiple
                                            placeholder="Masukan gambar produk ..." />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.textarea label="Deskripsi produk" name="deskripsi_produk" multiple
                                            placeholder="Masukan deskripsi produk ..." />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="flex items-center justify-end">
                                            <button class="btn btn-primary">SIMPAN</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display: flex; justify-content: flex-end;">
                                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
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

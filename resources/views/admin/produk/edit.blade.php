<x-app>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2>FORM EDIT DATA PRODUK</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('admin/produk', $produk->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-3">
                                        <x-input.input label="Nama produk" type="text" name="nama_produk"
                                            value="{{ $produk->nama_produk }}" placeholder="Masukan nama produk ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Harga produk" type="text" id="rupiah"
                                            name="harga_produk" value="{{ $produk->harga_produk }}"
                                            placeholder="Masukan harga produk ..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Berat produk" type="text" name="berat_produk"
                                            value="{{ $produk->berat_produk }}" placeholder="Ctx ('1 Pcs')..." />
                                    </div>
                                    <div class="col-md-3">
                                        <x-input.input label="Stok produk" type="number" name="stok_produk"
                                            value="{{ $produk->stok_produk }}" placeholder="Masukan stok produk ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.select label="Varian Produk" name="varian_produk">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Bulat" @if ($produk->varian_produk == 'Bulat') selected @endif>
                                                Bulat</option>
                                            <option value="Stik Potong"
                                                @if ($produk->varian_produk == 'Stik Potong') selected @endif>Stik Potong</option>
                                            <option value="Stik Tipis"
                                                @if ($produk->varian_produk == 'Stik Tipis') selected @endif>Stik Tipis</option>
                                            <option value="Kapsul" @if ($produk->varian_produk == 'Kapsul') selected @endif>
                                                Kapsul</option>
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.select label="Varian Rasa" name="varian_rasa">
                                            <option value="">--- Pilih ---</option>
                                            <option value="Original" @if ($produk->varian_rasa == 'Original') selected @endif>
                                                Original</option>
                                            <option value="Pedas" @if ($produk->varian_rasa == 'Pedas') selected @endif>
                                                Pedas</option>
                                            <option value="Keju" @if ($produk->varian_rasa == 'Keju') selected @endif>
                                                Keju</option>
                                            <option value="Rumput Laut"
                                                @if ($produk->varian_rasa == 'Rumput Laut') selected @endif>Rumput Laut</option>
                                        </x-input.select>
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="Thumbnail produk" type="file" name="thumbnail_produk"
                                            placeholder="Masukan thumbnail   produk ..." />
                                    </div>
                                    <div class="col-md-12">
                                        <x-input.textarea label="Deskripsi produk" name="deskripsi_produk"
                                            value="{!! $produk->deskripsi_produk !!}"
                                            placeholder="Masukan deskripsi produk ..." />
                                    </div>
                                    <div class="col-md-6">
                                        <div class="flex items-center justify-end">
                                            <button class="btn btn-primary">EDIT</button>
                                        </div>
                                    </div>
                                    <!-- Tombol Kembali -->
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

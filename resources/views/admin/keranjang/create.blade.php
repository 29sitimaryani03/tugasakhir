<x-com-admin.base>

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
                            <form action="{{ url('admin/keranjang/store') }}" method="post">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            <x-input.input label="Kode Keranjang" type="text" name="kode_keranjang" value="{{ $kode_keranjang }}"
                                            placeholder="Masukan kode keranjang ..." readonly />
                                        </div>
                                        <div class="col-md-6">
                                            <x-input.select label="Konsumen" name="id_konsumen">
                                                <option value="">--- Pilih ---</option>
                                                @foreach ($konsumen as $konsumens)
                                                <option value="{{$konsumens->id}}">{{$konsumens->nama}}</option>
                                                @endforeach
                                            </x-input.select>
                                        </div>
                                        <div class="col-md-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <x-table.th label="No." />
                                                        <x-table.th label="Image" />
                                                        <x-table.th label="Produk" />
                                                        <x-table.th label="Harga" />
                                                        <x-table.th label="Varian" />
                                                        <x-table.th label="Rasa" />
                                                        <x-table.th label="Qty" />
                                                        <x-table.th label="Pilih" />
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($produk as $produks)
                                                    <tr>
                                                        <x-table.td label=" {{ $loop->iteration }}" />
                                                        <x-table.td-action>
                                                            <img src="{{ url('public') }}/{{ $produks->thumbnail_produk }}" alt="" class="w-[60px] h-[60px]">
                                                        </x-table.td-action>
                                                        <x-table.td label="{{ $produks->nama_produk }}" />
                                                        <x-table.td label="{{ $produks->harga_produk }}" />
                                                        <x-table.td label="{{ $produks->varian_produk }}" />
                                                        <x-table.td label="{{ $produks->varian_rasa }}" />
                                                        <x-table.td-action>
                                                                <input type="hidden" name="harga_produk[]" value="{{ $produks->harga_produk }}">
                                                                <input type="number" name="banyak_produk[]" value="0" class="form-control w-[100px]" placeholder="Qty">
                                                        </x-table.td-action>
                                                        <x-table.td-action>
                                                                <input type="checkbox" name="id_produk[]" value="{{ $produks->id }}" class="form-checkbox"/>
                                                        </x-table.td-action>
                                                    </tr>
                                                    @endforeach
                                                </tbody>

                                            </table>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="flex items-center justify-end">
                                                <button class="btn btn-primary">MASUK KERANJANG</button>
                                            </div>
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
</x-com-admin.base>

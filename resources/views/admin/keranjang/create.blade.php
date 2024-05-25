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
                            <form action="{{ url('admin/keranjang') }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <x-input.input label="Kode Keranjang" type="text" name="kode_keranjang" value="{{ $kode_keranjang }}" placeholder="Masukan kode keranjang ..." readonly />
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

                                            <thead class="bg-dark">
                                                <th style="color: dark;">NO</th>
                                                <th style="color: dark;" class="text-center">Image</th>
                                                <th style="color: dark;" class="text-center">Produk</th>
                                                <th style="color: dark;" class="text-center">Harga</th>
                                                <th style="color: dark;" class="text-center">Varian</th>
                                                <th style="color: dark;" class="text-center">Rasa</th>
                                                <th style="color: dark;" class="text-center">Qty</th>
                                                <th style="color: dark;" class="text-center">Pilih</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($produk as $produks)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">
                                                        <img src="{{ url('public') }}/{{ $produks->thumbnail_produk }}" alt="" style="max-width: 80px; max-height: 50px;">
                                                    </td>
                                                    <td class=" text-center">{{ $produks->nama_produk }}
                                                    </td>
                                                    <td class="text-center">{{ $produks->rupiah() }}</td>
                                                    <td class="text-center">{{ $produks->varian_produk }}</td>
                                                    <td class="text-center">{{ $produks->varian_rasa }}</td>
                                                    <td class="text-center">
                                                        <input type="hidden" name="harga_produk[]" value="{{ $produks->harga_produk }}">
                                                        <input type="number" name="banyak_produk[]" value="0" class="form-control w-[100px]" placeholder="Qty">
                                                    </td>
                                                    <td class="text-center">
                                                        <input type="checkbox" name="id_produk[]" value="{{ $produks->id }}" class="form-checkbox" />
                                                    </td>
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
</x-app>
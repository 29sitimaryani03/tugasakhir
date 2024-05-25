<x-app>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Produk </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <a href="" data-toggle="modal" data-target="#tambah-data" class="float-right btn btn-dark"><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Image</th>
                                    <th style="color: dark;" class="text-center">Produk</th>
                                    <th style="color: dark;" class="text-center">Harga</th>
                                    <th style="color: dark;" class="text-center">Varian</th>
                                    <th style="color: dark;" class="text-center">Rasa</th>
                                    <th style="color: dark;" width="90px" class="text-center">AKSI</th>
                                </thead>
                                <tbody>
                                    @foreach ($list as $produk)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">
                                            <img src="{{ url('public') }}/{{ $produk->thumbnail_produk }}" alt="" class="w-[60px] h-[60px]">
                                        </td>
                                        <td class="text-center">{{ $produk->nama_produk }}</td>
                                        <td class="text-center">{{ $produk->rupiah() }}</td>
                                        <td class="text-center">{{ $produk->varian_produk }}</td>
                                        <td class="text-center">{{ $produk->varian_rasa }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/produk" id="{{ $produk->id }}" />
                                                <x-template.button.edit-button url="admin/produk" id="{{ $produk->id }}" />
                                                <x-template.button.delete-button url="admin/produk" id="{{ $produk->id }}" />
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
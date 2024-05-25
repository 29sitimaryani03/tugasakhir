<x-com-admin.base>
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
                            <div class="flex items-center justify-end ">
                                <a href="{{ url('admin/produk/create') }}" class="btn btn-success">
                                    <i class="bi bi-plus"></i>
                                    <span>Tambah Data</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <x-table.table>
                                <thead>
                                    <tr>
                                        <x-table.th label="No." />
                                        <x-table.th label="Image" />
                                        <x-table.th label="Produk" />
                                        <x-table.th label="Harga" />
                                        <x-table.th label="Varian" />
                                        <x-table.th label="Rasa" />
                                        <x-table.th label="Action" />
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $produk)

                                    <tr>
                                        <x-table.td label=" {{ $loop->iteration }}" />
                                        <x-table.td-action>
                                            <img src="{{ url('public') }}/{{ $produk->thumbnail_produk }}" alt="" class="w-[60px] h-[60px]">
                                        </x-table.td-action>
                                        <x-table.td label="{{ $produk->nama_produk }}" />
                                        <x-table.td label="{{  $produk->rupiah() }}" />
                                        <x-table.td label="{{ $produk->varian_produk }}" />
                                        <x-table.td label="{{ $produk->varian_rasa }}" />
                                        <x-table.td-action>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/produk/show', $produk->id  ) }}" class="btn btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ url('admin/produk/edit', $produk->id  ) }}" class="btn btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#delete{{ $produk->id  }}" class="btn btn-danger" data-toggle="modal">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </x-table.td-action>
                                    </tr>

                                    <x-modal.modal-delete id="delete{{ $produk->id  }}" url="{{ url('admin/produk/hapus', $produk->id  ) }}" />
                                    @endforeach
                                </tbody>

                            </x-table.table>
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

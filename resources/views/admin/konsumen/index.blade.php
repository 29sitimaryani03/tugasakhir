<x-com-admin.base>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Konsumen </h1>
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
                                <a href="{{ url('admin/konsumen/create') }}" class="btn btn-success">
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
                                        <x-table.th label="Nama" />
                                        <x-table.th label="Telepon" />
                                        <x-table.th label="alamat" />
                                        <x-table.th label="email" />
                                        <x-table.th label="Password" />
                                        <x-table.th label="Action" />
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $konsumen)
                                    <tr>
                                        <x-table.td label=" {{ $loop->iteration }}" />

                                        <x-table.td label="{{ $konsumen->nama }}" />
                                        <x-table.td label="{{ $konsumen->tlp }}" />
                                        <x-table.td label="{{ Str::limit($konsumen->alamat, 20) }}" />
                                        <x-table.td label="{{ $konsumen->email }}" />
                                        <x-table.td label="{{ Str::limit($konsumen->password, 20) }}" />
                                        <x-table.td-action>
                                            <div class="btn-group">
                                                <a href="{{ url('admin/konsumen/show', $konsumen->id  ) }}" class="btn btn-warning">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="{{ url('admin/konsumen/edit', $konsumen->id  ) }}" class="btn btn-primary">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="#delete{{ $konsumen->id  }}" data-toggle="modal" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </x-table.td-action>
                                    </tr>

                                    <x-modal.modal-delete id="delete{{ $konsumen->id  }}" url="{{ url('admin/konsumen/delete', $konsumen->id) }}" />
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

<x-app>
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
                            <a href="{{ url('admin/konsumen/create') }}" class="float-right btn btn-dark"><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="bg-dark">
                                    <th style="color: dark;">NO</th>
                                    <th style="color: dark;" class="text-center">Nama</th>
                                    <th style="color: dark;" class="text-center">Telepon</th>
                                    <th style="color: dark;" class="text-center">Alamat</th>
                                    <th style="color: dark;" class="text-center">Email</th>
                                    <th style="color: dark;" width="90px" class="text-center">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach ($list as $konsumen)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $konsumen->nama }}</td>
                                        <td class=" text-center">{{ $konsumen->tlp }}</td>
                                        <td class="text-center">{{ Str::limit($konsumen->alamat, 20) }}</td>
                                        <td class="text-center">{{ $konsumen->email }}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <x-template.button.info-button url="admin/konsumen" id="{{ $konsumen->id }}" />
                                                <x-template.button.edit-button url="admin/konsumen" id="{{ $konsumen->id }}" />
                                                <x-template.button.delete-button url="admin/konsumen" id="{{ $konsumen->id }}" />
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
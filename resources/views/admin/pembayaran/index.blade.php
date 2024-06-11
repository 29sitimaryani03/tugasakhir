<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> METODE PEMBAYARAN
        </h5>
    </div>
    <div class="card mt-4">
        <div class="card-header">
            <a href="" data-toggle="modal" data-target="#tambah-data" class="float-right btn btn-dark"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="bg-dark">
                    <th style="color: dark;" width="10px">NO</th>
                    <th style="color: dark;" class="text-center">NAMA PEMBAYARAN</th>
                    <th style="color: dark;" class="text-center">NOMOR</th>
                    <th style="color: dark;" class="text-center">TERSEDIA</th>
                    <th style="color: dark;" width="90px" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_payment->sortByDesc('created_at')->values() as $pembayaran)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $pembayaran->nama }}</td>
                        <td class="text-center">{{ $pembayaran->no }}</td>
                        <td class="text-center">{{ $pembayaran->available }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <x-template.button.edit-button url="admin/pembayaran" id="{{ $pembayaran->id }}" />
                                <x-template.button.delete-button url="admin/pembayaran" id="{{ $pembayaran->id }}" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Blog Category -->
    <div class="modal fade" id="tambah-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Metode Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/pembayaran') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">NAMA PEMBAYARAN</label>
                                    <input type="text" id="name" name="nama" class="form-control" required>
                                    @error('name')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">NO. HP/REKENING</label>
                                    <input type="text" id="no" name="no" class="form-control" required>
                                    @error('no')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>TERSEDIA</label>
                                    <select class="form-control" name="available" id="available" style="width: 100%;" required>
                                        <option value="">...</option>
                                        <option value="YA">YA</option>
                                        <option value="TIDAK">TIDAK</option>
                                    </select>
                                    @error('available')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">LOGO</label>
                                    <input class="form-control" type="file" name="url_logo" id="url_logo" required>
                                    @error('url_logo')
                                    <span class="text-danger" role="alert">
                                        <p style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- End Modal Tambah Customer -->
</x-app>
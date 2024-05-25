<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> BANNER
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
                    <th style="color: dark;" class="text-center">NAMA BANNER</th>
                    <th style="color: dark;" class="text-center">GAMBAR</th>
                    <th style="color: dark;" width="90px" class="text-center">AKSI</th>
                </thead>
                <tbody>
                    @foreach ($list_banner->sortByDesc('created_at')->values() as $banner)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $banner->name }}</td>
                        <td class="text-center">
                            <img src="{{ url($banner->url_banner) }}" alt="{{ $banner->name }}" style="max-width: 80px; max-height: 50px;">
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <x-template.button.edit-button url="admin/banner" id="{{ $banner->id }}" />
                                <x-template.button.delete-button url="admin/banner" id="{{ $banner->id }}" />
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
                    <h4 class="modal-title">Tambah Banner</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/banner') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">NAMA BANNER</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                    @error('name')
                                    <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" class="control-label">GAMBAR</label>
                                    <input class="form-control" type="file" name="url_banner" id="url_banner" required>
                                    @error('url_banner')
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
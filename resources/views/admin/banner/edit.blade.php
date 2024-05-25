<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA BANNER
        </h5>
    </div>
    <br>
    <x-template.button.back-button url="admin/banner" />
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/banner', $banner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row d-flex justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <label for="" class="control-label">GAMBAR</label>
                            <input class="mt-2 form-control-file @error('url_banner') is-invalid @enderror" type="file" name="url_banner" id="url_banner">
                            @error('url_banner')
                            <span class="text-danger" role="alert">
                                <p style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="control-label">NAMA BANNER</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $banner->name }}">
                            @error('name')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right"><i class="far fa-save"></i> Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app>
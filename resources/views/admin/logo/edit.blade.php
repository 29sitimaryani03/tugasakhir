<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA LOGO
        </h5>
    </div>
    <br>
    <x-template.button.back-button url="admin/logo" />
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/logo', $logo->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-row d-flex justify-content-center">
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <label for="" class="control-label">GAMBAR LOGO</label>
                            <input class="mt-2 form-control-file @error('url_logo') is-invalid @enderror" type="file" name="url_logo" id="url_logo">
                            @error('url_logo')
                            <span class="text-danger" role="alert">
                                <p style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card m-3" style="width: 18rem;">
                        <div class="card-body">
                            <label for="" class="control-label">LOGO ICON</label>
                            <input class="mt-2 form-control-file @error('url_ico') is-invalid @enderror" type="file" name="url_ico" id="url_ico">
                            @error('url_ico')
                            <span class="text-danger" role="alert">
                                <p style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row d-flex justify-content-center">

                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="control-label">NAMA WEB</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $logo->name }}">
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
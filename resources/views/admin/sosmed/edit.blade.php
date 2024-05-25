<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA SOSIAL MEDIA
        </h5>
    </div>
    <br>
    <x-template.button.back-button url="admin/sosmed" />
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/sosmed', $sosmed->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">NAMA</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $sosmed->name }}">
                            @error('name')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">Link</label>
                            <input type="text" id="link" name="link" class="form-control" value="{{ $sosmed->link }}">
                            @error('link')
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
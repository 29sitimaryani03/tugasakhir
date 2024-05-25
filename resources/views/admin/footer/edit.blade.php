<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT DATA
        </h5>
    </div>
    <br>
    <x-template.button.back-button url="admin/footer" />
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/footer', $footer->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <label>DESKRIPSI</label>
                        <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="summernote" cols="30" rows="3" value="">{{ $footer->text }}</textarea>
                        @error('text')
                        <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                        @enderror
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
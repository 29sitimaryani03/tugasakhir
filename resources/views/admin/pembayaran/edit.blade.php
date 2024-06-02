<x-app>
    <div class="card-header py-2">
        <h5 class="m-0 font-weight-bold text-dark" style="text-align:center; font-size: 25px"> EDIT METODE PEMBAYARAN
        </h5>
    </div>
    <br>
    <x-template.button.back-button url="admin/pembayaran" />
    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/pembayaran', $payment->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">NAMA PEMBAYARAN</label>
                            <input type="text" id="no" name="nama" class="form-control" value="{{ $payment->nama }}">
                            @error('name')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">NO. HP/REKENING</label>
                            <input type="text" id="no" name="no" class="form-control" value="{{ $payment->no }}">
                            @error('no')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>TERSEDIA</label>
                            <select class="form-control" name="available" id="available" style="width: 100%;">
                                @if($payment->available == 'YA')
                                <option value="YA">YA</option>
                                <option value="TIDAK">TIDAK</option>
                                @else
                                <option value="TIDAK">TIDAK</option>
                                <option value="YA">YA</option>
                                @endif
                            </select>
                            @error('available')
                            <p class="text-danger" style="font-size: 12px">* {{ $message }}</p style="font-size: 12px">
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="control-label">LOGO</label>
                            <input type="file" id="url_logo" name="url_logo" class="form-control" value="{{ $payment->url_logo }}">
                            @error('no')
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
<x-app>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card mt-3">
                        <div class="card-header">
                            <h2>FORM EDIT DATA KONSUMEN</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('admin/konsumen', $konsumen->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-4">
                                        <x-input.input label="Nama" type="text" name="nama" value="{{ $konsumen->nama }}" placeholder="Masukan nama konsumen ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="Telepon" type="text" name="tlp" value="{{ $konsumen->tlp }}" placeholder="Masukan telepon konsumen ..." />
                                    </div>
                                    <div class="col-md-4">
                                        <x-input.input label="Email" type="text" name="email" value="{{ $konsumen->email }}" placeholder="Masukan email konsumen ..." />
                                    </div>
                                    <div class="col-md-6">
                                        <x-input.input label="Password" type="text" name="password" placeholder="Masukan password konsumen ..." />
                                    </div>
                                    <div class="col-md-6">
                                        <x-input.input label="Alamat" type="text" name="alamat" value="{{ $konsumen->alamat }}" placeholder="Masukan alamat konsumen..." />
                                    </div>
                                    <div class="col-md-12">
                                        <div class="flex items-center justify-end">
                                            <button class="btn btn-primary">UPDATE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

        <!-- Modal maps -->

        <!-- Modal -->
        <div class="modal fade" id="modal-map" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pilih lokasi konsumen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div id="map" class="w-full h-[300px]" style="width:100%;height:300px"></div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #END Modal maps -->



    </section>
    <!-- /.content -->


    @push('js')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        $('#kliksaya').on('click', function() {
            $('#modal-map').modal('show')
        });


        var titikLokasi = [-1.8198068, 109.9964425];
        const map = L.map('map').setView(titikLokasi, 11);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker(titikLokasi).addTo(map)
            .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

        const popup = L.popup()
            .setLatLng(titikLokasi)
            .setContent('I am a standalone popup.')
            .openOn(map);

        function onMapClick(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            $('#lat').val(lat)
            $('#long').val(lng)
            popup
                .setLatLng(e.latlng)
                .setContent(`Saya disini ${e.latlng.toString()}`)
                .openOn(map);

            L.marker(e.latlng).addTo(map);

            $('#modal-map').modal('hide')
        }

        map.on('click', onMapClick);
    </script>
    @endpush
</x-app>
<x-com-admin.base>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="uppercase text-base text-slate-800">DETAIL KONSUMEN </h1>
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <ul class="flex flex-col">
                                        <li class="border-b-2 border-b-slate-200 py-2 flex items-center">
                                            <span class="w-[80px] block font-medium text-slate-500">Nama</span>
                                            <span class="w-4 flex items-center justify-center">:</span>
                                            <span>{{ $konsumen->nama }}</span>
                                        </li>
                                        <li class="border-b-2 border-b-slate-200 py-2 flex items-center">
                                            <span  class="w-[80px] block font-medium text-slate-500">Telepon</span>
                                            <span class="w-4 flex items-center justify-center">:</span>
                                            <span>{{ $konsumen->tlp }}</span>
                                        </li>
                                        <li class="border-b-2 border-b-slate-200 py-2 flex items-center">
                                            <span  class="w-[80px] block font-medium text-slate-500">Alamat</span>
                                            <span class="w-4 flex items-center justify-center">:</span>
                                            <span>{{ $konsumen->alamat }}</span>
                                        </li>
                                        <li class="border-b-2 border-b-slate-200 py-2 flex items-center">
                                            <span  class="w-[80px] block font-medium text-slate-500">Email</span>
                                            <span class="w-4 flex items-center justify-center">:</span>
                                            <span>{{ $konsumen->email }}</span>
                                        </li>
                                        <li class="border-b-2 border-b-slate-200 py-2 flex items-center">
                                            <span  class="w-[80px] block font-medium text-slate-500">Password</span>
                                            <span class="w-4 flex items-center justify-center">:</span>
                                            <span>{{ $konsumen->password }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
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

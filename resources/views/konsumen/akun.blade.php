<x-com-konsumen.app>
    @php
        $password = Str::limit($list->password, 40);
        $passMask =  Str::mask($password, '*', 1);
    @endphp
    <div class="md:mx-[150px] pb-[100px]">
        <!-- Grid -->
        <div class="grid grid-cols-12 pt-[150px]">

            <div class="lg:col-span-12 ">
                <div class="bg-white p-3 rounded-md shadow-sm grid md:grid-cols-2 gap-3 w-[calc(100vw_-_32px)]">
                    <ul class="flex flex-col">
                        <li class="flex flex-col pb-3">
                            <div class="flex items-center gap-2 pb-2">
                                <i class="bi bi-person text-[18px]"></i>
                                <span class="uppercase text-pink-500 text-sm font-semibold">Nama</span>
                            </div>
                            <span class="px-6 inline-block text-base text-slate-700">{{ $list->nama }}</span>
                        </li>
                        <li class="flex flex-col pb-3">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-phone text-base"></i>
                                <span class="uppercase text-pink-500 text-sm font-semibold">Telepon</span>
                            </div>
                            <span class="px-6 inline-block text-base text-slate-700">{{ $list->tlp }}</span>
                        </li>
                        <li class="flex flex-col pb-3">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-phone text-base"></i>
                                <span class="uppercase text-pink-500 text-sm font-semibold">Alamat</span>
                            </div>
                            <span class="px-6 inline-block text-base text-slate-700">{{ $list->alamat }}</span>
                        </li>
                        <li class="flex flex-col pb-3">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-envelope text-base"></i>
                                <span class="uppercase text-pink-500 text-sm font-semibold">Email</span>
                            </div>
                            <span class="px-6 inline-block text-base text-slate-700">{{ $list->email }}</span>
                        </li>
                        <li class="flex flex-col pb-3">
                            <div class="flex items-center gap-2">
                                <i class="bi bi-key text-base"></i>
                                <span class="uppercase text-pink-500 text-sm font-semibold">Password</span>
                            </div>
                            <span class="px-6 inline-block text-base text-slate-700">{{  $passMask }}</span>
                        </li>
                    </ul>
                    <form action="{{ url('konsumen/akunUpdate') }}" method="POST">
                        @csrf
                        <ul class="flex flex-col">
                            <li class="mb-3">
                                <x-com-landing.input label="Nama" name="nama" value="{{ $list->nama }}" placeholder="Masukan nama ..." />
                            </li>
                            <li class="mb-3">
                                <x-com-landing.input label="Teelepon" name="tlp" value="{{ $list->tlp }}" placeholder="Masukan telepon ..." />
                            </li>
                            <li class="mb-3">
                                <x-com-landing.input label="Alamat" name="alamat" value="{{ $list->alamat }}" placeholder="Masukan alamat ..." />
                            </li>
                            <li class="mb-3">
                                <x-com-landing.input label="Email" name="email" value="{{ $list->email }}" placeholder="Masukan email ..." />
                            </li>
                            <li class="mb-3">
                                <x-com-landing.input label="Password Baru" name="new_password" placeholder="Masukan password baru..." id="new_password"/>
                                <span class="error-pass text-[12px] text-red-500 inline-block right-0">Minimal 5 karakter</span>
                            </li>
                            <li class="mb-3">
                                <x-com-landing.input label="Ulangi Password Baru" name="chek_new_password" placeholder="Ulangi password baru..." id="confirm_new_password"/>
                            </li>
                            <li class="mb-3">
                                <button class="btn btn-primary">Update Akun</button>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </div>
        <!-- End Grid -->
    </div>
    @push('js')
        <script>
            $('.error-pass').hide()
            $('#new_password').change(function(){
                if($(this).val().length < 5){
                    $('#new_password').addClass('is-invalid');
                    $('.error-pass').show('slow')
                }else{
                    $('.error-pass').hide('slow')
                    $('#new_password').removeClass('is-invalid');
                }
            })
            $('#confirm_new_password').change(function(){
                var val1 = $(this).val();
                var val2 = $('#new_password').val();

                if(val1 != val2){
                    $('#confirm_new_password').addClass('is-invalid');
                }else{
                    if($('#confirm_new_password').hasClass('is-invalid')){
                        $('#confirm_new_password').removeClass('is-invalid');
                    }
                }

            })

        </script>
    @endpush
</x-com-konsumen.app>

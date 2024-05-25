<div class="modal fade" id="{{ $id ?? '' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ $url ?? '' }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <div class="flex items-center justify-center flex-col gap-2">
                        <h2 class="text-red-500 text-center text-[18px]">Yakin ingin menghapus data ini ?!</h2>
                        <p class="text-center text-base text-slate-500">Setelah menghapus data, data yang telah dihapus tidak bisa dikembalikan lagi.</p>
                    </div>
                    <div class="flex items-center justify-center gap-2 w-full mt-6">
                        <button type="button" class="btn btn-success bg-green-500 hover:bg-green-600" data-dismiss="modal">BATAL</button>
                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-600">TETAP HAPUS</button>
                       </div>
                </div>

            </div>
        </form>
    </div>
</div>

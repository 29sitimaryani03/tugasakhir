<!-- Modal -->
<div class="modal fade" id="{{ $id ?? '' }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
       <form action="{{ $action ?? '#' }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-body flex items-center justify-center flex-col">
                    <h2 class="text-xl text-red-500 mb-2 font-semibold text-center">Yakin ingin menghapus data ini ?!</h2>
                    <p class="text-sm text-slate-500 font-medium text-center">Harap berhati hati dalam menghapus data, karena
                        data yang anda hapus tidak bisa dikembalikan lagi !</p>
                </div>
                <div class="modal-footer flex items-center justify-center gap-2">
                    <button type="button" class="btn btn-success bg-emerald-500" data-bs-dismiss="modal">BATAL</button>
                    <button type="submit" class="btn btn-danger bg-red-500">TETAP HAPUS</button>
                </div>
            </div>
        </form>
    </div>
</div>

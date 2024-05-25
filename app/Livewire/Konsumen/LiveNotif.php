<?php

namespace App\Livewire\Konsumen;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;
use Livewire\Component;

class LiveNotif extends Component
{
    public $no = 0;

    // public function updateData(){

    // }

    public function render()
    {
        $id = Auth::user()->id;
        $d =  Keranjang::where('id_konsumen', $id)
                        ->groupBy('kode_keranjang')
                        ->count();
        $this->no = $d;
        return view('livewire.konsumen.live-notif');
    }
}

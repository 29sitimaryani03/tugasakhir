<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;


class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_transaksi',
        'id_produk',
        'id_user',
        'banyak_produk',
        'jumlah_harga',
        'alamat',
        'pesan',
        'metode_pembayaran',
        'bukti_pembayaran',
        'status_transaksi',
    ];

    public function items()
    {
        return $this->hasMany(TransaksiItem::class, 'id_transaksi', 'id');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id'); // Sesuaikan dengan nama model dan kolom kunci asing Anda
    }


    function handleUploadFoto()
    {
        if (request()->hasFile('bukti_pembayaran')) {
            $this->handleDeleteFoto();
            $bukti_pembayaran = request()->file('bukti_pembayaran');
            $destination = "bukti_pembayaran";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $bukti_pembayaran->extension();
            $url = $bukti_pembayaran->storeAs($destination, $filename);
            $this->bukti_pembayaran = "app/" . $url;
            $this->save();
        }
    }
    function handleDeleteFoto()
    {
        $bukti_pembayaran = $this->bukti_pembayaran;
        if ($bukti_pembayaran) {
            $path = public_path($bukti_pembayaran);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }

    function tglIndo()
    {
        $tanggal = Carbon::parse($this->created_at);

        return $tanggal->translatedFormat('l, j F Y');
    }
    function jamIndo()
    {
        $created_at = $this->created_at;
        $jam = $created_at->format('H:i:s'); // Format jam: HH:MM:SS
        return $jam;
    }
}

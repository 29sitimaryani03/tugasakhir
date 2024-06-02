<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Keranjang extends Model
{
    use HasFactory;
    protected $table = "keranjang";
    protected $fillable = [
        'kode_keranjang',
        'id_produk',
        'id_konsumen',
        'banyak_produk',
        'jumlah_harga',
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($cart) {
            $cart->kode_keranjang = $cart->generateCartCode();
        });
    }

    private function generateCartCode()
    {
        // Mendapatkan tahun saat ini
        $year = date('Y');

        // Mengambil data keranjang terakhir dari database untuk tahun ini
        $lastCartOfYear = self::whereYear('created_at', $year)->latest()->first();

        // Mengecek apakah ada data keranjang untuk tahun ini
        if (!$lastCartOfYear) {
            $sequence = 1;
        } else {
            // Mengambil urutan dari kode keranjang terakhir untuk tahun ini
            $lastSequence = intval(substr($lastCartOfYear->kode_keranjang, 9)); // Ambil 4 digit terakhir sebagai urutan
            // Increment urutan
            $sequence = $lastSequence + 1;
        }

        // Menghasilkan kode keranjang baru dengan format KR-tahun-urutan
        $formattedSequence = str_pad($sequence, 4, '0', STR_PAD_LEFT); // Pastikan urutan selalu memiliki 4 digit dengan leading zero jika perlu
        return "KR-$year-$formattedSequence";
    }
}

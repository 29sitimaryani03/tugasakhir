<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;


class Transaksi extends Model
{
    use HasFactory;
    protected $table = "transaksi";
    protected $fillable = [
        'kode_transaksi',
        'id_produk',
        'id_konsumen',
        'banyak_produk',
        'jumlah_harga',
        'metode_pembayaran',
        'bukti_pembayaran',
        'status_transaksi',
    ];

    static $field = [
        'id_produk'  => 'required',
        'id_konsumen'  => 'required',
        'banyak_produk'  => 'required',
        'jumlah_harga'  => 'required',
        'metode_pembayaran'  => 'required',
    ];

    static $pesan = [
        'id_produk.required'  => 'Harus diisi, tidak bolh kosong !',
        'id_konsumen.required'  => 'Harus diisi, tidak bolh kosong !',
        'banyak_produk.required'  => 'Harus diisi, tidak bolh kosong !',
        'jumlah_harga.required'  => 'Harus diisi, tidak bolh kosong !',
        'metode_pembayaran.required'  => 'Harus diisi, tidak bolh kosong !',
    ];

    function konsumen()
    {
        return $this->belongsTo(Konsumen::class, 'id_konsumen', 'id');
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
            $this->save;
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($cart) {
            $cart->kode_transaksi = $cart->generateCartCode();
        });
    }

    private function generateCartCode()
    {
        // Mendapatkan tahun saat ini
        $year = date('d');

        // Mengambil data keranjang terakhir dari database untuk tahun ini
        $lastCartOfYear = self::whereYear('created_at', $year)->latest()->first();

        // Mengecek apakah ada data keranjang untuk tahun ini
        if (!$lastCartOfYear) {
            $sequence = 1;
        } else {
            // Mengambil urutan dari kode keranjang terakhir untuk tahun ini
            $lastSequence = intval(substr($lastCartOfYear->kode_transaksi, 9)); // Ambil 4 digit terakhir sebagai urutan
            // Increment urutan
            $sequence = $lastSequence + 1;
        }

        // Menghasilkan kode keranjang baru dengan format KR-tahun-urutan
        $formattedSequence = str_pad($sequence, 4, '0', STR_PAD_LEFT); // Pastikan urutan selalu memiliki 4 digit dengan leading zero jika perlu
        return "TRNS-$year-$formattedSequence";
    }
}

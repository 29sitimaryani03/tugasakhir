<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produk extends Model
{
    use HasFactory;

    protected $table = "produk";
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'berat_produk',
        'stok_produk',
        'varian_produk',
        'thumbnail_produk',
        'deskripsi_produk',
    ];

    static $field = [
        'nama_produk' => 'reuired|uniq:produk|min:5',
        'harga_produk' => 'reuired',
        'berat_produk' => 'reuired',
        'stok_produk' => 'reuired',
        'varian_produk' => 'reuired',
        'varian_rasa' => 'reuired',
        'thumbnail_produk' => 'reuired',
        'deskripsi_produk' => 'reuired|min:10',
    ];
    static $pesan = [
        'nama_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'nama_produk.uniq' => 'Produk sudah ada !',
        'nama_produk.min' => 'Minimal 5 Karakter !',
        'harga_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'berat_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'stok_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'varian_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'varian_rasa.reuired' => 'Harus diisi, tidak bolh kosong !',
        'thumbnail_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'deskripsi_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'deskripsi_produk.min' => 'Minimal 10 Karakter !',
    ];

    function handleUploadFoto()
    {
        if (request()->hasFile('thumbnail_produk')) {
            $this->handleDeleteFoto();
            $thumbnail_produk = request()->file('thumbnail_produk');
            $destination = "produk";
            $randomStr = Str::random(5);
            $filename = $this->id . "-" . time() . "-" . $randomStr . "." . $thumbnail_produk->extension();
            $url = $thumbnail_produk->storeAs($destination, $filename);
            $this->thumbnail_produk = "app/" . $url;
            $this->save;
        }
    }
    function handleDeleteFoto()
    {
        $thumbnail_produk = $this->thumbnail_produk;
        if ($thumbnail_produk) {
            $path = public_path($thumbnail_produk);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }



    function galeri()
    {
        return $this->hasMany(Galeri::class, 'id_produk');
    }

    function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_produk');
    }

    function rupiah()
    {
        $harga = $this->harga_produk;
        return 'Rp.' . number_format($harga, 0, ',', '.');
    }
}

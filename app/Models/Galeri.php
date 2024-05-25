<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = "galeri";
    protected $fillable = [
        'id_produk',
        'gambar',
    ];

    static $field = [
        'id_produk' => 'reuired',
        'gambar' => 'reuired',
    ];
    static $pesan = [
        'id_produk.reuired' => 'Harus diisi, tidak bolh kosong !',
        'gambar.reuired' => 'Harus diisi, tidak bolh kosong !',
    ];




}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Konsumen extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "konsumen";
    protected $fillable = [
        'nama',
        'tlp',
        'alamat',
        'email',
        'password',
    ];

    static $field = [
        'nama' => 'required',
        'tlp' => 'required',
        'alamat' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

    static $pesan = [
        'nama.required' => 'Harus diisi, tidak bolh kosong !',
        'tlp.required' => 'Harus diisi, tidak bolh kosong !',
        'alamat.required' => 'Harus diisi, tidak bolh kosong !',

        'email.required' => 'Harus diisi, tidak bolh kosong !',
        'password.required' => 'Harus diisi, tidak bolh kosong !',
    ];
}

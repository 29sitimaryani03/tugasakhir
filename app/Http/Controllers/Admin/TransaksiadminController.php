<?php

namespace App\Http\Controllers\Admin;


use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Galeri;
use App\Models\Transaksi;
use App\Models\Konsumen;

class TransaksiadminController extends Controller
{

    function index()
    {
        $data['list'] = Transaksi::get();
        return view('admin.transaksi.index', $data);
    }

    function create()
    {
        return view('admin,transaksi.create');
    }

    function store()
    {
    }
    function show()
    {
    }
    function edit()
    {
    }
    // function update($kode_transaksi)
    // {
    //     $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->firstOrFail();
    //     if (request('alamat')) $transaksi->alamat = request('alamat');
    //     if (request('metode_pembayaran')) $transaksi->metode_pembayaran = request('metode_pembayaran');
    //     if (request('pesan')) $transaksi->pesan = request('pesan');

    //     $transaksi->save();

    //     return redirect()->back()->with('success', 'Permintaan Diproses');
    // }
    function delete()
    {
    }
    function checkout()
    {
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\Konsumen;
use App\Models\Keranjang;


class KeranjangadminController extends Controller
{
    function index()
    {
        $data['list'] = Keranjang::with('konsumen')
            ->with('produk')
            ->select('keranjang.*')
            ->selectRaw('COUNT(*) as jumlah_produk, SUM(jumlah_harga) as total_harga, kode_keranjang')
            ->groupBy('kode_keranjang')
            ->get();


        return view('admin.keranjang.index', $data);
    }

    function create()
    {
        $data['produk'] = Produk::get();
        $data['konsumen'] = Konsumen::get();
        $data['kode_keranjang'] =  Str::random(10);;
        return view('admin.keranjang.create', $data);
    }

    function store(Request $request)
    {

        $request->validate(Keranjang::$field, Keranjang::$pesan);
        for ($i = 0; $i < count($request->id_produk); $i++) {

            $jumlah_harga = $request->harga_produk[$i] * $request->banyak_produk[$i];

            $keranjang = new Keranjang;
            $keranjang->kode_keranjang = $request->kode_keranjang;
            $keranjang->id_produk = $request->id_produk[$i];
            $keranjang->id_konsumen = $request->id_konsumen;
            $keranjang->banyak_produk = $request->banyak_produk[$i];
            $keranjang->jumlah_harga = $jumlah_harga;
            $simpan = $keranjang->save();
        }

        if ($simpan) {
            return redirect('admin/keranjang')->with('success', 'Data berhasil disimpan !');
        } else {
            return back()->with('danger', 'Data gagal disimpan !');
        }
    }

    function show($id)
    {
        $data['list'] = Keranjang::with('produk')
            ->with('konsumen')
            ->select('keranjang.*')
            ->where('kode_keranjang', $id)
            ->get();
        // return $data;
        return view('admin.keranjang.show', $data);
    }

    function checkout(Request $request)
    {

        if ($request->id_produk != null) {
            // return $request;

            for ($i = 0; $i < count($request->id_produk); $i++) {
                $cek = Keranjang::where('kode_keranjang', $request->kode_keranjang)
                    ->where('id_produk', $request->id_produk[$i])
                    ->get();

                return $cek;
            }
        } else {
            return "produk belum dipilih";
        }
    }
}

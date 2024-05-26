<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\Konsumen;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;

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
            $keranjang->id_user = $request->id_user;
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

    public function tambahKeKeranjang($id_produk)
    {
        // Cek apakah produk sudah ada di keranjang
        $keranjang = Keranjang::where('id_produk', $id_produk)->first();

        if ($keranjang) {
            // Jika produk sudah ada di keranjang, tingkatkan jumlah produknya
            $keranjang->update([
                'banyak_produk' => $keranjang->banyak_produk + 1 // Atau sesuaikan dengan kuantitas tambahan yang diinginkan
            ]);
        } else {
            // Jika produk belum ada di keranjang, tambahkan produk baru
            Keranjang::create([
                'id_produk' => $id_produk,
                'banyak_produk' => 1 // Atau sesuaikan dengan kuantitas awal yang diinginkan
            ]);
        }

        // Redirect atau kembali ke halaman keranjang
        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function addToCart(Request $request)
    {
        // Periksa apakah pengguna sudah login
        if (Auth::check()) {
            $user_id = Auth::id();

            // Periksa apakah produk sudah ada dalam keranjang pengguna
            $existing_cart = Keranjang::where('id_user', $user_id)
                ->where('id_produk', $request->id_produk)
                ->first();

            if ($existing_cart) {
                // Jika produk sudah ada dalam keranjang, tingkatkan kuantitas dan jumlah harga
                $existing_cart->increment('banyak_produk', $request->banyak_produk);
                $existing_cart->jumlah_harga += $request->harga_produk * $request->banyak_produk;
                $existing_cart->save();
                return redirect('cart')->with('success', 'Kuantitas produk berhasil diperbarui dalam keranjang!');
            } else {
                // Jika produk belum ada dalam keranjang, tambahkan produk baru ke keranjang
                $cart = new Keranjang();
                $cart->id_user = $user_id;
                $cart->id_produk = $request->id_produk;
                $cart->banyak_produk = $request->banyak_produk;
                $cart->jumlah_harga = $request->harga_produk * $request->banyak_produk;
                $cart->save();
                return redirect('cart')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
            }
        } else {
            // Jika pengguna belum login, kembalikan pesan untuk login
            return back()->with('danger', 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang!');
        }
    }
}

<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Keranjang;
use App\Models\Logo;
use App\Models\Produk;
use App\Models\Sosmed;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function filter()
    {
        $nama = request('nama');
        $data['nama'] = $nama;
        $data['list_produk'] = Produk::where('nama_produk', 'like', "%$nama%")->paginate(3);

        return view('frontview.shop', $data);
    }

    public function filter2()
    {
        $harga_min = request('harga_min');
        $harga_max = request('harga_max');

        // Lakukan validasi untuk memastikan harga minimum tidak melebihi harga maksimum
        if ($harga_min > $harga_max) {
            // Jika harga minimum melebihi harga maksimum, balikkan pengguna kembali dengan pesan kesalahan
            return back()->with('error', 'Harga minimum tidak boleh melebihi harga maksimum.');
        }

        // Simpan harga minimum dan maksimum dalam array data
        $data = [
            'harga_min' => $harga_min,
            'harga_max' => $harga_max
        ];

        // Query untuk mengambil produk berdasarkan rentang harga
        $data['list_produk'] = Produk::whereBetween('harga_produk', [$harga_min, $harga_max])->paginate(3);

        // Mengirimkan data ke tampilan
        return view('frontview.shop', $data);
    }


    function home()
    {
        $data['list_produk'] = Produk::all();
        $logo = Logo::first();
        $footer = Footer::first();
        $sosmed = Sosmed::all();
        $banner = Banner::first();
        return view('frontview.home', $data, compact('logo', 'footer', 'sosmed', 'banner'));
    }

    function shop()
    {
        $data['list_produk'] = Produk::with('galeri')->get();
        $data['list_produk'] = Produk::paginate(8);

        return view('frontview.shop', $data);
    }

    public function product($id)
    {
        return view('frontview.product', [
            'produk' => Produk::findOrFail($id)
        ]);
    }

    function cart()
    {
        $list_cart = Keranjang::with('produk')->where('id_user', auth()->id())->get();

        return view('frontview.cart', compact('list_cart'));
    }

    public function showCheckoutCart($id)
    {
        return view('frontview.checkout', [
            'cart' => Keranjang::findOrFail($id)
        ]);
    }

    function showPesan()
    {
        $user = Auth::user();
        $data['list_pesan'] = Transaksi::where('id_user', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontview.order', $data);
    }

    function pesanan()
    {
        if (Auth::user()) {
            $transaksi = new Transaksi();
            $transaksi->id_user = request()->user()->id;
            $transaksi->id_produk = request('id_produk');
            $transaksi->banyak_produk = request('banyak_produk');
            $transaksi->jumlah_harga = request('jumlah_harga');
            $transaksi->alamat = request('alamat');
            $transaksi->pesan = request('pesan');
            $transaksi->metode_pembayaran = request('metode_pembayaran');
            $transaksi->status_transaksi = 'New';
            $transaksi->save();

            return redirect('order')->with('success', 'CheckOut Telah Berhasil!!');
        } else {
            return back()->with('danger', ('Silahkan Login Untuk Menjautkan!'));
        }
    }

    function destroy($id)
    {
        $cart = Keranjang::find($id);
        $cart->delete();
        return redirect('cart')->with('danger', 'Data Berhasil Dihapus');
    }
}

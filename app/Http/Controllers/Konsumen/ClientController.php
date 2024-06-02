<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Keranjang;
use App\Models\Logo;
use App\Models\Pembayaran;
use App\Models\Produk;
use App\Models\Sosmed;
use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    function filter()
    {
        $nama = request('nama');
        $data['nama'] = $nama;
        $data['list_produk'] = Produk::where('nama_produk', 'like', "%$nama%")->paginate(3);

        return view('frontview.shop', $data);
    }

    public function getCartCount()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $cartCount = Keranjang::where('id_user', $userId)->count();
            return $cartCount;
        }
        return 0;
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

    function showPesan()
    {
        $user = Auth::user();
        $data['list_pesan'] = Transaksi::where('id_user', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontview.order', $data);
    }

    public function checkout(Request $request)
    {
        // Pastikan pengguna telah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('danger', 'Anda harus login untuk melanjutkan checkout.');
        }

        // Validasi apakah ada produk yang dipilih untuk checkout
        $selectedProducts = $request->input('selected_products');
        if (empty($selectedProducts)) {
            return redirect()->back()->with('danger', 'Pilih setidaknya satu produk sebelum checkout.');
        }

        $selectedProductsInfo = Keranjang::whereIn('id', $selectedProducts)->get();

        // Hitung total harga dari produk yang dipilih
        $totalHarga = $selectedProductsInfo->sum('jumlah_harga');

        // Hitung banyak Produk
        $banyakProduk = $selectedProductsInfo->sum('banyak_produk');

        // Mulai transaksi dalam database
        $transaction = new Transaksi();
        $transaction->id_user = Auth::id();
        $transaction->metode_pembayaran = $request->input('metode_pembayaran');
        $randomString = strtoupper(substr(md5(time()), 0, 4));
        $randomInvoiceNumber = mt_rand(100000, 999999);
        $transaction->kode_transaksi = 'TRNS' . $randomInvoiceNumber . $randomString;
        // $transaction->status_transaksi = 'Menunggu Pembayaran';
        $transaction->jumlah_harga = $totalHarga;
        $transaction->banyak_produk = $banyakProduk;
        $transaction->save();

        // Simpan detail transaksi (item-item yang dibeli) dan kurangi stok produk
        foreach ($selectedProductsInfo as $productInfo) {
            $transactionItem = new TransaksiItem();
            $transactionItem->id_transaksi = $transaction->id; // ID transaksi yang baru dibuat
            $transactionItem->id_produk = $productInfo->produk->id; // ID produk
            $transactionItem->jumlah_produk = $productInfo->banyak_produk; // Jumlah produk yang dibeli
            $transactionItem->harga_produk = $productInfo->jumlah_harga; // Harga produk
            $transactionItem->save();

            // Hapus produk dari keranjang
            $productInfo->delete();
        }

        // Tampilkan halaman checkout dengan informasi transaksi
        return redirect('checkout/' . $transaction->kode_transaksi);
    }

    public function transaction($kode_transaksi)
    {
        $transaction = Transaksi::where('kode_transaksi', $kode_transaksi)->first();
        $pembayaran = Pembayaran::all();

        return view('frontview.checkout', compact('transaction', 'pembayaran'));
    }

    public function updateTransaksi($kode_transaksi)
    {
        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->firstOrFail();

        if (request('alamat')) {
            $transaksi->alamat = request('alamat');
        }
        if (request('id_pembayaran')) {
            $transaksi->id_pembayaran = request('id_pembayaran');
        }
        if (request('pesan')) {
            $transaksi->pesan = request('pesan');
        }
        if (request('bukti_pembayaran')) {
            $transaksi->handleUploadFoto();
        }

        $transaksi->save();

        $id_pembayaran = request('id_pembayaran');
        $pembayaran = Pembayaran::find($id_pembayaran);


        if ($pembayaran->nama === 'CASH ON DELIVERY') {
            // Update the status pengiriman
            $transaksi->status_transaksi = 'Diproses';
            $transaksi->save();

            // Mengambil semua item produk dalam transaksi
            $items = $transaksi->items; // Asumsi terdapat relasi `items` dalam model Transaksi

            // Mengurangi stok produk berdasarkan jumlah yang dibeli
            foreach ($items as $item) {
                $produk = $item->produk; // Asumsi terdapat relasi `produk` dalam model item
                $produk->stok_produk -= $item->jumlah_produk;
                $produk->save();
            }

            return redirect('order')->with('success', 'Pesanan Di Proses');
        } else {
            return redirect('confirm/' . $transaksi->kode_transaksi);
        }
    }


    public function updateTransaksi2($kode_transaksi)
    {
        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->firstOrFail();
        if (request('bukti_pembayaran')) $transaksi->handleUploadFoto();
        $transaksi->status_transaksi = 'Diproses';

        $transaksi->save();

        // Mengambil semua item produk dalam transaksi
        $items = $transaksi->items; // Asumsi terdapat relasi `items` dalam model Transaksi

        // Mengurangi stok produk berdasarkan jumlah yang dibeli
        foreach ($items as $item) {
            $produk = $item->produk; // Asumsi terdapat relasi `produk` dalam model item
            $produk->stok_produk -= $item->jumlah_produk;
            $produk->save();
        }

        return redirect('order')->with('success', 'CheckOut Berhasil!!');
    }

    public function confirm($kode_transaksi)
    {
        $transaction = Transaksi::where('kode_transaksi', $kode_transaksi)->first();

        return view('frontview.confirm', compact('transaction'));
    }

    function destroy($id)
    {
        $cart = Keranjang::find($id);
        $cart->delete();
        return redirect('cart')->with('danger', 'Data Berhasil Dihapus');
    }
}

<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;

use Illuminate\Support\Facades\Auth;

class DashboardkonsumenController extends Controller
{
    function index(){
        $data['list'] = Produk::get();
        return view('konsumen.dashboard', $data);
    }

    function produk(){
        $data['list'] = Produk::get();

        return view('konsumen.produk', $data);
    }

    function masukeranjang(Produk $produk){
        $data['list'] = $produk->with('galeri')->get();

        return view('konsumen.produkdetail', $data);
    }

    function prosesmasukkeranjang(Request $request, $id){
        $keranjang = new Keranjang;
        $keranjang->id_produk = $id;
        $keranjang->id_konsumen = $request->id_konsumen;
        $keranjang->banyak_produk = $request->banyak_produk;
        $keranjang->jumlah_harga = $request->jumlah_harga;
        $simpan = $keranjang->save();
        if ($simpan) {
            return redirect('konsumen/keranjang')->with('success', 'Produk berhasil dimasukan ke keranjang !');
        }else{
            return back()->with('danger', 'Produk gagal dimasukan ke keranjang !');
        }
    }

    function keranjang(){
        $id = Auth::user()->id;
        $data['list'] =  Keranjang::with('produk')->with('konsumen')
                        ->where('id_konsumen', $id)
                        ->get();
        return view('konsumen.keranjang', $data);
    }

    function checkout(Request $request){
        $data = [];
        $ids = $request->id;
        if ($ids) {

            $keranjang = Keranjang::whereIn('id', $ids)->get();
            $jumlah_produk = $keranjang->count();
            $total_harga = 0;
            foreach ($keranjang as $item) {

                $total_harga += $item->jumlah_harga;
            }

            // Format total harga ke dalam format mata uang Rupiah
            $total_harga_formatted = "Rp " . number_format($total_harga, 0, ',', '.');

            // Menggabungkan data ke dalam array $data
            $data['jumlah_produk'] = $jumlah_produk;
            $data['total_harga'] = $total_harga_formatted;
            $data['konsumen'] = Auth::user()->id;
            $data['keranjang'] = $keranjang;

        }
        return view('konsumen.metodebayar', $data);

    }

    function prosescheckout(Request $request){

        // return $request;
        $kode_keranjang = $request->kode_keranjang;
        $metode_pembayaran = $request->metode_pembayaran;
        $bukti_pembayaran = $request->bukti_pembayaran;
        if ($metode_pembayaran == 'Transfer') {
            if ($bukti_pembayaran == null) {
                return redirect('konsumen/keranjang')->with('danger', 'Silahkan upload bukti pembayaran anda !');
            }else{
                for ($i=0; $i < count($request->kode_keranjang); $i++) {
                    $hapusKeranjang = Keranjang::where('kode_keranjang', $kode_keranjang[$i])->delete();
                    if($hapusKeranjang){
                        $transaksi = new Transaksi;
                        $transaksi->id_produk = $request->id_produk[$i];
                        $transaksi->id_konsumen = $request->id_konsumen;
                        $transaksi->banyak_produk = $request->banyak_produk[$i];
                        $transaksi->jumlah_harga = $request->jumlah_harga[$i];
                        $transaksi->metode_pembayaran = $request->metode_pembayaran;
                        $transaksi->handleUploadFoto();
                        $transaksi->status_transaksi = "Baru";
                        $simpan = $transaksi->save();
                    }else{
                        return redirect('/konsumen/keranjang')->with('success', 'Transaksi berhasil dilakukan !');
                    }
                }
                if ($simpan) {

                    return redirect('/konsumen/keranjang')->with('success', 'Transaksi berhasil dilakukan !');
                }else{
                    return redirect('konsumen/keranjang')->with('danger', 'Transakis gagal dilakukan, coba ulangi kembali !');
                }
            }
        }
        else{
            for ($i=0; $i < count($request->kode_keranjang); $i++) {
                $hapusKeranjang = Keranjang::where('kode_keranjang', $kode_keranjang[$i])->delete();
                    if($hapusKeranjang){
                        $transaksi = new Transaksi;
                        $transaksi->id_produk = $request->id_produk[$i];
                        $transaksi->id_konsumen = $request->id_konsumen;
                        $transaksi->banyak_produk = $request->banyak_produk[$i];
                        $transaksi->jumlah_harga = $request->jumlah_harga[$i];
                        $transaksi->metode_pembayaran = $request->metode_pembayaran;
                        $transaksi->status_transaksi = "Baru";
                        $simpan = $transaksi->save();
                    }else{
                        return redirect('/konsumen/keranjang')->with('success', 'Transaksi berhasil dilakukan !');
                    }
            }
            if ($simpan) {

                return redirect('/konsumen/keranjang')->with('success', 'Transaksi berhasil dilakukan !');
            }else{
                return redirect('konsumen/keranjang')->with('danger', 'Transakis gagal dilakukan, coba ulangi kembali !');
            }
        }
    }

    function transaksi(){
        $idLogin = Auth::user()->id;
        $data['list'] = Transaksi::select('transaksi.kode_transaksi', 'transaksi.status_transaksi', 'transaksi.created_at')
                        ->selectRaw('kode_transaksi, COUNT(id) as jumlah_produk, SUM(jumlah_harga) as total_harga')
                        ->where('id_konsumen', $idLogin)
                        ->groupBy('kode_transaksi')
                        ->get();

        return view('konsumen.transaksi', $data);
    }
    
    function show($id){
        $data['list'] = Transaksi::select('transaksi.*')
                        ->with('produk')
                        ->selectRaw('kode_transaksi, COUNT(id) as jumlah_produk, SUM(jumlah_harga) as total_harga')
                        ->where('kode_transaksi', $id)
                        ->groupBy('kode_transaksi')
                        ->get();
        return view('konsumen.transaksi_detail', $data);
    }

    function hapusKeranjang(Keranjang $id){
        $hapus = $id->delete();
        if ($hapus) {

            return back()->with('success', 'Transaksi berhasil dilakukan !');
        }else{
            return back()->with('danger', 'Transakis gagal dilakukan, coba ulangi kembali !');
        }
    }

    function tentang(){
        return view('konsumen.tentang');
    }

    function akun(){
        $data['list'] = Auth::user();
        return view('konsumen.akun', $data);
    }

    function akunUpdate(Request $req){

        $konsumen = Auth::user();

        if ($req->new_password != null) {

            $konsumen->nama = $req->nama;
            $konsumen->tlp = $req->tlp;
            $konsumen->alamat = $req->alamat;
            $konsumen->email = $req->email;
            $konsumen->password = bcrypt($req->new_password);
            $simpan = $konsumen->update();
            if ($simpan) {
                return back()->with('success', 'Akun Berhasil di Update');
            }
            return back()->with('danger', 'Akun Gagal di Update');

        }else{

            $konsumen->nama = $req->nama;
            $konsumen->tlp = $req->tlp;
            $konsumen->alamat = $req->alamat;
            $konsumen->email = $req->email;
            $simpan = $konsumen->update();
            if ($simpan) {
                return back()->with('success', 'Akun Berhasil di Update');
            }
            return back()->with('danger', 'Akun Gagal di Update');
        }

    }
}

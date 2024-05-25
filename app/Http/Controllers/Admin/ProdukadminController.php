<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Galeri;

class ProdukadminController extends Controller
{
    function index()
    {
        $data['list'] = Produk::get();
        return view('admin.produk.index', $data);
    }

    function create()
    {
        return view('admin.produk.create');
    }

    function store(Request $request)
    {
        $harga =  Str::of($request->harga_produk)->replace(['Rp ', '.'], '');
        $gambar = $request->file('gambar');
        // Simpan produk
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $harga;
        $produk->berat_produk = $request->berat_produk;
        $produk->stok_produk = $request->stok_produk;
        $produk->varian_produk = $request->varian_produk;
        $produk->varian_rasa = $request->varian_rasa;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $produk->handleUploadFoto();
        $simpanProduk = $produk->save();
        if ($simpanProduk) {
            foreach ($gambar as $img) {
                $nama_gambar = $img->hashName();
                $galeri = new Galeri;
                $galeri->id_produk = $produk->id;
                $galeri->gambar = 'app/produk/' . $nama_gambar;
                $simpan = $galeri->save();

                if ($simpan) {
                    $img->storeAs('produk/', $nama_gambar);
                }
            }
            return redirect('admin/produk')->with('success', 'Produk berhasil ditambahkan !');
        } else {
            return back()->with('danger', 'Produk gagal ditambahkan !');
        }
    }

    function show($id)
    {
        $data['list'] = Produk::with('galeri')->where('id', $id)->get();
        return view('admin.produk.show', $data);
    }

    public function edit($id)
    {
        return view('admin.produk.edit', [
            'produk' => Produk::findOrFail($id),
        ]);
    }
    function update(Request $request, Produk $id)
    {
        $harga =  Str::of($request->harga_produk)->replace(['Rp ', '.'], '');
        $produk = $id;
        if ($request->thumbnail_produk != null) {
            // Hapus thumbnail lama
            $hapus = $produk->handleDeleteFoto();
            if ($hapus) {
                if (request('nama_produk')) $produk->nama_produk = request('nama_produk');
                if (request('harga_produk')) $produk->harga_produk = $harga;
                if (request('berat_produk')) $produk->berat_produk = request('berat_produk');
                if (request('stok_produk')) $produk->stok_produk = request('stok_produk');
                if (request('varian_produk')) $produk->varian_produk = request('varian_produk');
                if (request('varian_rasa')) $produk->varian_rasa = request('varian_rasa');
                if (request('thumbnail_produk')) $produk->handleUploadFoto();
                if (request('deskripsi_produk')) $produk->deskripsi_produk = request('deskripsi_produk');
                $edit = $produk->update();
                if ($edit) {
                    return redirect('admin/produk')->with('success', 'Produk berhasil diupdate !');
                } else {
                    return back()->with('danger', 'Produk gagal diupdate !');
                }
            } else {
                return back()->with('danger', 'Produk gagal diupdate !');
            }
        } else {
            if (request('nama_produk')) $produk->nama_produk = request('nama_produk');
            if (request('harga_produk')) $produk->harga_produk = $harga;
            if (request('berat_produk')) $produk->berat_produk = request('berat_produk');
            if (request('stok_produk')) $produk->stok_produk = request('stok_produk');
            if (request('varian_produk')) $produk->varian_produk = request('varian_produk');
            if (request('varian_rasa')) $produk->varian_rasa = request('varian_rasa');
            if (request('deskripsi_produk')) $produk->deskripsi_produk = request('deskripsi_produk');
            $edit = $produk->update();
            if ($edit) {
                return redirect('admin/produk')->with('success', 'Produk berhasil diupdate !');
            } else {
                return back()->with('danger', 'Produk gagal diupdate !');
            }
        }
    }

    function destroy($id)
    {

        $produk = Produk::with('galeri')->find($id);
        $galeri = $produk->galeri;
        $filePaths = [];
        foreach ($galeri as $key => $value) {
            $filePaths[] = $value->gambar;
            $value->delete();
        }
        $hapusGaleri = $this->handleDeleteMultipleFoto($filePaths);
        if ($hapusGaleri) {
            $hapusThumb = $produk->handleDeleteFoto();
            if ($hapusThumb) {
                $produk->delete();
                return back()->with('success', 'Produk berhasil dihapus !');
            } else {
                return back()->with('danger', 'Produk gagal dihapus !');
            }
        } else {
            return back()->with('danger', 'Produk gagal dihapus !');
        }
    }

    // Hapus file di galeri
    function handleDeleteMultipleFoto($filePaths)
    {
        foreach ($filePaths as $filePath) {
            if ($filePath) {
                $path = public_path($filePath);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        return true;
    }
}

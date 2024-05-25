<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    public function getLogo()
    {
        $logo = Logo::first(); // Ambil logo pertama dari database, Anda bisa menyesuaikan dengan kebutuhan Anda
        return $logo;
    }

    public function index()
    {
        $data['list_logo'] = Logo::all();
        return view('admin.logo.index', $data);
    }

    public function store(Request $request)
    {
        $logo = new Logo();
        $logo->name = request('name');
        $logo->save();

        $logo->handleUploadImg();
        $logo->handleUploadIco();

        return redirect('admin/logo')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.logo.edit', [
            'logo' => Logo::findOrFail($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $logo = Logo::find($id);
        if (request('name')) $logo->name = request('name');
        $logo->save();

        if (request('url_logo')) $logo->handleUploadImg();
        if (request('url_ico')) $logo->handleUploadIco();

        return redirect('admin/logo')->with('success', 'Berhasil di Edit');
    }

    function destroy($id)
    {
        $logo = Logo::find($id);
        $logo->handleDeleteImg();
        $logo->delete();
        return redirect('admin/logo')->with('danger', 'Data Berhasil Dihapus');
    }
}

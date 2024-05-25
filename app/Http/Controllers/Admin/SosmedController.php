<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function getSosmed()
    {
        $sosmed = Sosmed::all(); // Ambil sosmed pertama dari database, Anda bisa menyesuaikan dengan kebutuhan Anda
        return $sosmed;
    }

    public function index()
    {
        $data['list_sosmed'] = Sosmed::all();
        return view('admin.sosmed.index', $data);
    }

    public function edit($id)
    {
        return view('admin.sosmed.edit', [
            'sosmed' => Sosmed::findOrFail($id),
        ]);
    }

    public function store(Request $request)
    {
        $sosmed = new Sosmed();
        $sosmed->name = request('name');
        $sosmed->link = request('link');
        $sosmed->save();

        return redirect('admin/sosmed')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update($id, Request $request)
    {
        $sosmed = Sosmed::find($id);
        if (request('name')) $sosmed->name = request('name');
        if (request('link')) $sosmed->link = request('link');
        $sosmed->save();

        return redirect('admin/sosmed')->with('success', 'Berhasil di Edit');
    }

    function destroy($id)
    {
        $sosmed = Sosmed::find($id);
        $sosmed->delete();
        return redirect('admin/sosmed')->with('danger', 'Data Berhasil Dihapus');
    }
}

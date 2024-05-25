<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function getFooter()
    {
        $footer = Footer::first(); // Ambil footer pertama dari database, Anda bisa menyesuaikan dengan kebutuhan Anda
        return $footer;
    }

    public function index()
    {
        $data['list_footer'] = Footer::all();
        return view('admin.footer.index', $data);
    }

    public function store(Request $request)
    {
        $footer = new Footer();
        $footer->text = request('text');
        $footer->save();

        return redirect('admin/footer')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        return view('admin.footer.edit', [
            'footer' => Footer::findOrFail($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $footer = Footer::find($id);
        if (request('text')) $footer->text = request('text');
        $footer->save();

        return redirect('admin/footer')->with('success', 'Berhasil di Edit');
    }

    function destroy($id)
    {
        $footer = Footer::find($id);
        $footer->delete();
        return redirect('admin/footer')->with('danger', 'Data Berhasil Dihapus');
    }
}

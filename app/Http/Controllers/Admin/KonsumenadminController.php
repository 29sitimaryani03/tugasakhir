<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Konsumen;

class KonsumenadminController extends Controller
{
    function index()
    {
        $data['list'] = Konsumen::get();
        return view('admin.konsumen.index', $data);
    }

    function create()
    {
        return view('admin.konsumen.create');
    }

    function store(Request $request)
    {

        $request->validate(Konsumen::$field, Konsumen::$pesan);

        $kon = new Konsumen;
        $kon->nama = $request->nama;
        $kon->tlp = $request->tlp;
        $kon->alamat = $request->alamat;
        $kon->email = $request->email;
        $kon->password = bcrypt($request->password);
        $simpan = $kon->save();

        if ($simpan) {
            return redirect('admin/konsumen')->with('success', 'Data berhasil disimpan !');
        } else {
            return back()->with('danger', 'Data gagal disimpan !');
        }
    }

    function show($id)
    {
        $data['konsumen'] = Konsumen::find($id);
        return view('admin.konsumen.show', $data);
    }

    function edit($id)
    {
        $data['konsumen'] = Konsumen::find($id);

        return view('admin.konsumen.edit', $data);
    }

    function update(Request $request, $id)
    {
        $kon = Konsumen::find($id);


        if ($request->password != null) {

            if (request('nama')) $kon->nama = request('nama');
            if (request('tlp')) $kon->tlp = request('tlp');
            if (request('alamat')) $kon->alamat = request('alamat');
            if (request('email')) $kon->email = request('email');
            if (request('password')) $kon->password = bcrypt($request->password);
            $simpan = $kon->update();

            if ($simpan) {
                return redirect('admin/konsumen')->with('success', 'Data berhasil diupdate !');
            } else {
                return back()->with('danger', 'Data gagal diudate !');
            }
        } else {

            if (request('nama')) $kon->nama = request('nama');
            if (request('tlp')) $kon->tlp = request('tlp');
            if (request('alamat')) $kon->alamat = request('alamat');
            if (request('email')) $kon->email = request('email');
            $simpan = $kon->update();

            if ($simpan) {
                return redirect('admin/konsumen')->with('success', 'Data berhasil diudate !');
            } else {
                return back()->with('danger', 'Data gagal diudate !');
            }
        }
    }

    function destroy($id)
    {
        $delete = Konsumen::find($id)->delete();

        if ($delete) {
            return back()->with('success', 'Data berhasil dihapus !');
        } else {
            return back()->with('danger', 'Data gagal dihapus !');
        }
    }
}

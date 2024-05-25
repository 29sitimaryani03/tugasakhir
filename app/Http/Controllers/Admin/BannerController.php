<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function index()
    {
        $data['list_banner'] = Banner::all();
        return view('admin.banner.index', $data);
    }

    public function store(Request $request)
    {
        $banner = new Banner();
        $banner->name = request('name');
        $banner->save();

        $banner->handleUploadImg();

        return redirect('admin/banner')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function Show($id)
    {
        return view('admin.banner.show', [
            'banner' => Banner::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return view('admin.banner.edit', [
            'banner' => Banner::findOrFail($id),
        ]);
    }

    public function update($id, Request $request)
    {
        $banner = Banner::find($id);
        if (request('name')) $banner->name = request('name');
        $banner->save();

        if (request('url_banner')) $banner->handleUploadImg();

        return redirect('admin/banner')->with('success', 'Berhasil di Edit');
    }

    function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->handleDeleteImg();
        $banner->delete();
        return redirect('admin/banner')->with('danger', 'Data Berhasil Dihapus');
    }
}

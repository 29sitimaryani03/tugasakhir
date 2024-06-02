<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data['list_payment'] = Pembayaran::all();
        return view('admin.pembayaran.index', $data);
    }

    public function edit($id)
    {
        return view('admin.pembayaran.edit', [
            'payment' => Pembayaran::findOrFail($id),
        ]);
    }

    public function store(Request $request)
    {
        $payment = new Pembayaran();
        $payment->nama = request('nama');
        $payment->no = request('no');
        $payment->available = request('available');
        $payment->save();

        $payment->handleUploadLogo();

        return redirect('admin/pembayaran')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function update($id, Request $request)
    {
        $payment = Pembayaran::find($id);
        if (request('nama')) $payment->nama = request('nama');
        if (request('no')) $payment->no = request('no');
        if (request('available')) $payment->available = request('available');
        $payment->save();

        if (request('url_logo')) $payment->handleUploadLogo();

        return redirect('admin/pembayaran')->with('success', 'Berhasil di Edit');
    }

    function destroy($id)
    {
        $payment = Pembayaran::find($id);
        $payment->handleDeleteLogo();
        $payment->delete();
        return redirect('admin/pembayaran')->with('danger', 'Data Berhasil Dihapus');
    }
}

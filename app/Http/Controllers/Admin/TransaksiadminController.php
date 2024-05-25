<?php
namespace App\Http\Controllers\Admin;


use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Galeri;
use App\Models\Transaksi;
use App\Models\Konsumen;

class TransaksiadminController extends Controller{

    function index (){
        $data['list'] = Transaksi::get();
        return view('admin.transaksi.index', $data);
    }

    function create(){
        return view('admin,transaksi.create');
    }

    function store(){}
    function show(){}
    function edit(){}
    function update(){}
    function delete(){}
    function checkout(){}
}

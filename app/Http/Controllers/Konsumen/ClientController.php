<?php

namespace App\Http\Controllers\Konsumen;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use App\Models\Logo;
use App\Models\Produk;
use App\Models\Sosmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function home()
    {
        $data['list_produk'] = Produk::all();
        $logo = Logo::first();
        $footer = Footer::first();
        $sosmed = Sosmed::all();
        return view('frontview.home', $data, compact('logo', 'footer', 'sosmed'));
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
}

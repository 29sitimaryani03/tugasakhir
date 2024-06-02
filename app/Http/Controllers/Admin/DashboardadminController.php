<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardadminController extends Controller
{
    function index()
    {
        $proses = Transaksi::where('status_transaksi', '=', 'Diproses')->count();
        $kirim = Transaksi::where('status_transaksi', '=', 'Dikirim')->count();
        $pengguna = User::where('type', '=', 'USER')->count();
        return view('admin.dashboard.index', compact('proses', 'kirim', 'pengguna'));
    }
}

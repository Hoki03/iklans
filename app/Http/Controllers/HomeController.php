<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function beranda()
    {
        $jum_transaksi = Transaksi::count();
        $jum_user = User::count();
        $data_transaksi = Transaksi::get();
        $data_user = User::get();
        return view('dashboard', compact('jum_transaksi', 'jum_user', 'data_transaksi', 'data_user'));
    }
}

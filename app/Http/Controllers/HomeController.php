<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function beranda()
    {
        return view('dashboard');
    }
    public function transaksi()
    {
        return view('transaksi');
    }
    public function datauser()
    {
        return view('datauser', compact('data_user'));
        $data_user = User::get();
    }
    public function datatransaksi()
    {
        return view('datatransaksi');
    }
}

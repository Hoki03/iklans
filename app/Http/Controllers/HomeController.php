<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    public function transaksi()
    {
        return view('transaksi.transaksi');
    }

    public function form(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'  =>  'required',
            'nominal' => 'required',
            'keterangan' => 'nullable',
            'tanggal'  =>  'required',
            'jenis_id' => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data_transaksi['nama']     = $request->nama;
        $data_transaksi['nominal']  = $request->nominal;
        $data_transaksi['keterangan']  = $request->keterangan;
        $data_transaksi['tanggal']  = $request->tanggal;
        $data_transaksi['jenis_id']  = $request->jenis_id;

        Transaksi::create($data_transaksi);


        return view('transaksi.transaksi');
    }

    public function user()
    {
        $data_user = User::get();

        return view('user.datauser', compact('data_user'));
    }

    public function edit_user(Request $request, $id)
    {
        $data_user = User::find($id);
        return view('user.edituser', compact('data_user'));
    }

    public function update_user(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'nullable',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data_user['name']     = $request->name;
        $data_user['email']  = $request->email;
        $data_user['level']  = $request->level;
        if ($request->password) {
            $data_user['password']  = bcrypt($request->password);
        }

        User::whereId($id)->update($data_user);

        return redirect()->route('data_user');
    }

    public function hapus_user(Request $request, $id)
    {
        $data_user = User::find($id);
        if ($data_user) {
            $data_user->delete();
        }
        return redirect()->route('data_user');
    }

    public function form_user()
    {
        return view('user.tambahuser');
    }

    public function tambah_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data_user['name']     = $request->name;
        $data_user['email']  = $request->email;
        $data_user['level']  = $request->level;
        $data_user['password']  = bcrypt($request->password);

        User::create($data_user);

        return redirect()->route('data_user');
    }

    public function data_transaksi()
    {
        $data_transaksi = Transaksi::get();
        return view('transaksi.datatransaksi', compact('data_transaksi'));
    }
}

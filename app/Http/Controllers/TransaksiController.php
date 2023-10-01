<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
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



    public function data_transaksi()
    {
        $data_transaksi = Transaksi::get();
        return view('transaksi.datatransaksi', compact('data_transaksi'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function form()
    {
        return view('transaksi.create');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'  =>  'required',
            'nominal' => 'required',
            'keterangan' => 'nullable',
            'tanggal'  =>  'required',
            'jenis_id' => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $index['nama']     = $request->nama;
        $index['nominal']  = $request->nominal;
        $index['keterangan']  = $request->keterangan;
        $index['tanggal']  = $request->tanggal;
        $index['jenis_id']  = $request->jenis_id;

        Transaksi::create($index);


        return view('transaksi.create');
    }

    public function index()
    {
        $index = Transaksi::get();
        return view('transaksi.index', compact('index'));
    }

    public function edit(Request $request, $id)
    {
        $index = Transaksi::find($id);
        return view('transaksi.edit', compact('index'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'  =>  'required',
            'nominal' => 'required|numeric',
            'keterangan' => 'required',
            'tanggal' => 'required',
            'jenis_id' => 'required|exists:jenis,id',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $index['nama']     = $request->nama;
        $index['nominal']  = $request->nominal;
        $index['tanggal']  = $request->tanggal;
        $index['jenis_id']  = $request->jenis_id;
        if ($request->keterangan) {
            $index['keterangan']  = $request->keterangan;
        }

        Transaksi::whereId($id)->update($index);

        return redirect()->route('transaksi.index');
    }


    public function destroy(Request $request, $id)
    {
        $index = Transaksi::find($id);
        if ($index) {
            $index->delete();
        }
        return redirect()->route('transaksi.index');
    }

    public function struk(Request $request, $id)
    {
        $index = Transaksi::find($id);
        $transaksi = Transaksi::get();

        return view('transaksi.struk', compact('index', 'transaksi'));
    }
}

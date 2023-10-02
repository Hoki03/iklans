<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $index = User::get();

        return view('user.index', compact('index'));
    }

    public function edit(Request $request, $id)
    {
        $index = User::find($id);
        return view('user.edit', compact('index'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'nullable',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $index['name']     = $request->name;
        $index['email']  = $request->email;
        $index['level']  = $request->level;
        if ($request->password) {
            $index['password']  = bcrypt($request->password);
        }

        User::whereId($id)->update($index);

        return redirect()->route('user.index');
    }

    public function destroy(Request $request, $id)
    {
        $index = User::find($id);
        if ($index) {
            $index->delete();
        }
        return redirect()->route('user.index');
    }

    public function form()
    {
        return view('user.create');
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  =>  'required',
            'email' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $index['name']     = $request->name;
        $index['email']  = $request->email;
        $index['level']  = $request->level;
        $index['password']  = bcrypt($request->password);

        User::create($index);

        return redirect()->route('user.index');
    }
}

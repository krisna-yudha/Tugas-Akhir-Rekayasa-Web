<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makul;

class MakulController extends Controller
{
    public function index()
    {
        $makul = Makul::all();
        return view('makul.index', compact('makul'));
    }

    public function create()
    {
        return view('makul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makul',
        ]);
        Makul::create($request->all());
        return redirect()->route('makul.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $mk = Makul::findOrFail($id);
        return view('makul.edit', compact('mk'));
    }

    public function update(Request $request, $id)
    {
        $mk = Makul::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makul,kode,'.$id,
        ]);
        $mk->update($request->all());
        return redirect()->route('makul.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Makul::destroy($id);
        return redirect()->route('makul.index')->with('success', 'Data berhasil dihapus');
    }
}
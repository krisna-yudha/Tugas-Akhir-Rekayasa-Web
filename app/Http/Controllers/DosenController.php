<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosen',
        ]);
        Dosen::create($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data berhasil ditambah');
    }

    public function edit($id)
    {
        $dsn = Dosen::findOrFail($id);
        return view('dosen.edit', compact('dsn'));
    }

    public function update(Request $request, $id)
    {
        $dsn = Dosen::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosen,nidn,'.$id,
        ]);
        $dsn->update($request->all());
        return redirect()->route('dosen.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Dosen::destroy($id);
        return redirect()->route('dosen.index')->with('success', 'Data berhasil dihapus');
    }
}
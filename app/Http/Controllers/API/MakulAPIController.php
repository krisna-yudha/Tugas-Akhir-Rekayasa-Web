<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Makul;
use Illuminate\Http\Request;

class MakulAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makul = Makul::all();
        return response()->json([
            'status' => 'success',
            'data' => $makul
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makul,kode'
        ]);

        $makul = Makul::create($request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data mata kuliah berhasil ditambahkan',
            'data' => $makul
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $makul = Makul::find($id);
        
        if (!$makul) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data mata kuliah tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $makul
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $makul = Makul::find($id);
        
        if (!$makul) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data mata kuliah tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'required',
            'kode' => 'required|unique:makul,kode,'.$id
        ]);

        $makul->update($request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data mata kuliah berhasil diupdate',
            'data' => $makul
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $makul = Makul::find($id);
        
        if (!$makul) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data mata kuliah tidak ditemukan'
            ], 404);
        }

        $makul->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data mata kuliah berhasil dihapus'
        ]);
    }
}

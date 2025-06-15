<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::all();
        return response()->json([
            'status' => 'success',
            'data' => $dosen
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosen,nidn'
        ]);

        $dosen = Dosen::create($request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data dosen berhasil ditambahkan',
            'data' => $dosen
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dosen = Dosen::find($id);
        
        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data dosen tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $dosen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);
        
        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data dosen tidak ditemukan'
            ], 404);
        }

        $request->validate([
            'nama' => 'required',
            'nidn' => 'required|unique:dosen,nidn,'.$id
        ]);

        $dosen->update($request->all());
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data dosen berhasil diupdate',
            'data' => $dosen
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        
        if (!$dosen) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data dosen tidak ditemukan'
            ], 404);
        }

        $dosen->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Data dosen berhasil dihapus'
        ]);
    }
}

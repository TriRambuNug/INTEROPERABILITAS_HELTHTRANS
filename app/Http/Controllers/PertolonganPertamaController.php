<?php

namespace App\Http\Controllers;

use App\Models\PertolonganPertama;
use Illuminate\Http\Request;

class PertolonganPertamaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pertolonganPertama = PertolonganPertama::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menampilkan data',
                'data' => $pertolonganPertama
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|string',
        ]);

        $pertolonganPertama = PertolonganPertama::create($validatedData);

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan',
            'data' => $pertolonganPertama,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pertolonganPertama = PertolonganPertama::findOrFail($id);
        if (!$pertolonganPertama) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditemukan',
            'data' => $pertolonganPertama,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PertolonganPertama $pertolonganPertama)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pertolonganPertama = PertolonganPertama::findOrFail($id);

        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|string',
        ]);

        $pertolonganPertama->update($validatedData);

        if (!$pertolonganPertama) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diupdate',
            'data' => $pertolonganPertama,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pertolonganPertama = PertolonganPertama::findOrFail($id);
        if (!$pertolonganPertama) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        $pertolonganPertama->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus',
        ], 200);
    }

}

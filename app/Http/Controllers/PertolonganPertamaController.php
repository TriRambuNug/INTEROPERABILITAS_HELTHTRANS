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
        return PertolonganPertama::all();
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
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
        return response()->json([
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

        return response()->json([
            'message' => 'Data berhasil diupdate',
            'data' => $pertolonganPertama,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        PertolonganPertama::destroy($id);
        return response()->json(null, 204);
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $pasien = Pasien::all();
            return response()->json([
                'message' => 'Berhasil menampilkan data',
                'data' => $pasien,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menampilkan data',
                'data' => $e->getMessage(),
            ], 400);
        }
        return Pasien::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'nama' => 'required|string',
        'alamat'=> 'required|string',
        'no_telp' => 'required|string',
        'tanggal_lahir'  => 'required|date',
        'jenis_kelamin'  => 'required|string',
        'gol_darah' => 'required|string',
        'riwayat_penyakit' => 'required|string',
        ]);

        try{
            $pasien = Pasien::create($validateData);
            return response()->json([
                'message' => 'Data berhasil disimpan',
                'data' => $pasien,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal disimpan',
                'data' => $e->getMessage(),
            ], 400);
        
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $pasien = Pasien::findorFail($id);
            return response()->json([
                'message' => 'Berhasil menampilkan data',
                'data' => $pasien,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal menampilkan data',
                'data' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findorFail($id);
        $validateData = $request->validate([
            'nama' => 'required|string',
            'alamat'=> 'required|string',
            'no_telp' => 'required|string',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|string',
            'gol_darah' => 'required|string',
            'riwayat_penyakit' => 'required|string',
        ]);

       try {
           $pasien->update($validateData);
           return response()->json([
               'message' => 'Data berhasil diubah',
               'data' => $pasien,
           ], 200);
       } catch (\Exception $e) {
           return response()->json([
               'message' => 'Data gagal diubah',
               'data' => $e->getMessage(),
           ], 400);
       }
    }
        //
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $id->delete();
            return response()->json([
                'message' => 'Data berhasil dihapus',
                'data' => $id,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Data gagal dihapus',
                'data' => $e->getMessage(),
            ], 400);
        }
    }
}

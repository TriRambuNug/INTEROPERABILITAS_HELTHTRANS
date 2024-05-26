<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $petugas = Petugas::all();
            return response()->json([
                'success' => true,
                'message' => 'List Data Petugas',
                'data'    => $petugas
            ], 200);
        }
        catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Mengambil Data Petugas',
                'data'    => ''
            ], 400);
        }
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

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'nip' => 'required|string|max:255',
        ]);

        try{
            $petugas = new Petugas;
            $petugas->nama = $request->nama;
            $petugas->jabatan = $request->jabatan;
            $petugas->alamat = $request->alamat;
            $petugas->no_telp = $request->no_telp;
            $petugas->nip = $request->nip;
            $petugas->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Petugas Berhasil Disimpan',
                'data'    => $petugas
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data Petugas Gagal Disimpan',
                'data'    => ''
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $petugas = Petugas::find($id);
            if (!$petugas) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Petugas dengan ID ' . $id . ' Tidak Ditemukan',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Petugas',
                'data'    => $petugas
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Petugas Tidak Ditemukan',
                'data'    => ''
            ], 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'nip' => 'required|string|max:255',
        ]);

       try{
            $petugas = Petugas::find($id);
            $petugas->nama = $request->nama;
            $petugas->jabatan = $request->jabatan;
            $petugas->alamat = $request->alamat;
            $petugas->no_telp = $request->no_telp;
            $petugas->nip = $request->nip;
            $petugas->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Petugas Berhasil Diupdate',
                'data'    => $petugas
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Petugas Gagal Diupdate',
                'data'    => ''
            ], 400);
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $petugas = Petugas::find($id);
            $petugas->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Petugas Berhasil Dihapus',
                'data'    => $id
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Data Petugas Gagal Dihapus',
                'data'    => ''
            ], 400);
        }
    }
}

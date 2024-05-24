<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $rumahSakit = RumahSakit::all();
            return response()->json([
                'success' => true,
                'message' => 'List Data Rumah Sakit',
                'data'    => $rumahSakit
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Gagal Mengambil Data Rumah Sakit',
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
        'alamat' => 'required|string|max:255',
        'nomer_telp' => 'required|string|max:20',
        'email' => 'required|string|email|max:255',
    ]);

    try {
        $rumahSakit = new RumahSakit;
        $rumahSakit->nama = $request->nama;
        $rumahSakit->alamat = $request->alamat;
        $rumahSakit->nomer_telp = $request->nomer_telp;
        $rumahSakit->email = $request->email;
        $rumahSakit->save();

        return response()->json([
            'success' => true,
            'message' => 'Data Rumah Sakit Berhasil Disimpan',
            'data'    => $rumahSakit
        ], 200);
    } catch(\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Data Rumah Sakit Gagal Disimpan',
            'data'    => '',
            'error'   => $e->getMessage()
        ], 400);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $rumahSakit = RumahSakit::find($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail Data Rumah Sakit',
                'data'    => $rumahSakit
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data Rumah Sakit Tidak Ditemukan',
                'data'    => ''
            ], 400);
        }
    }
    

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RumahSakit $rumahSakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $rumahSakit = RumahSakit::find($id);
            $rumahSakit->nama = $request->nama;
            $rumahSakit->alamat = $request->alamat;
            $rumahSakit->nomer_telp= $request->nomer_telp;
            $rumahSakit->email = $request->email;
            $rumahSakit->save();

            return response()->json([
                'success' => true,
                'message' => 'Data Rumah Sakit Berhasil Diupdate',
                'data'    => $rumahSakit
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data Rumah Sakit Gagal Diupdate',
                'data'    => ''
            ], 400);
        
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RumahSakit $rumahSakit)
    {
        try{
            $rumahSakit->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data Rumah Sakit Berhasil Dihapus',
                'data'    => $rumahSakit
            ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Data Rumah Sakit Gagal Dihapus',
                'data'    => ''
            ], 400);
        }
    }
}

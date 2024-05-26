<?php

namespace App\Http\Controllers;

use App\Http\Resources\Dokumentasi as ResourcesDokumentasi;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $dokumentasi = Dokumentasi::all();
            return response()->json([
                'status' => 'success',
                'data' => ResourcesDokumentasi::collection($dokumentasi)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'pasien_id' => 'required',
            'petugas_id' => 'required',
            'diagnosa' => 'required',
            'tindakan' => 'required',
            'tanggal' => 'required',
        ]);

        try{
            $dokumentasi = new Dokumentasi;
            $dokumentasi->pasien_id = $request->pasien_id;
            $dokumentasi->petugas_id = $request->petugas_id;
            $dokumentasi->diagnosa = $request->diagnosa;
            $dokumentasi->tindakan = $request->tindakan;
            $dokumentasi->tanggal = $request->tanggal;
            $dokumentasi->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => new ResourcesDokumentasi($dokumentasi)
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
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $dokumentasi = Dokumentasi::find($id);
            return response()->json([
                'status' => 'success',
                'data' => new ResourcesDokumentasi($dokumentasi)
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
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $dokumentasi = Dokumentasi::find($id);
            $dokumentasi->pasien_id = $request->pasien_id;
            $dokumentasi->petugas_id = $request->petugas_id;
            $dokumentasi->diagnosa = $request->diagnosa;
            $dokumentasi->tindakan = $request->tindakan;
            $dokumentasi->tanggal = $request->tanggal;
            $dokumentasi->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diupdate',
                'data' => new ResourcesDokumentasi($dokumentasi)
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $dokumentasi = Dokumentasi::find($id);
            $dokumentasi->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
                'data' => new ResourcesDokumentasi($dokumentasi)
            ], 200);
        }
        catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

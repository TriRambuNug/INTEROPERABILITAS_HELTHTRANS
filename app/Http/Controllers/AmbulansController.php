<?php

namespace App\Http\Controllers;

use App\Http\Resources\Ambulans as ResourcesAmbulans;
use App\Models\Ambulans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AmbulansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $ambulans = Ambulans::all();
            return response()->json([
                'status' => 'success',
                'data' => ResourcesAmbulans::collection($ambulans)
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
            'petugas_id' => 'required',
            'rumah_sakit_id' => 'required',
            'tipe' => 'required',
            'lokasi' => 'required',
            'plat_nomor' => 'required',
            'status' => 'required',
        ]);
        try{
            $ambulans = new Ambulans;
            $ambulans->petugas_id = $request->petugas_id;
            $ambulans->rumah_sakit_id = $request->rumah_sakit_id;
            $ambulans->tipe = $request->tipe;
            $ambulans->lokasi = $request->lokasi;
            $ambulans->plat_nomor = $request->plat_nomor;
            $ambulans->status = $request->status;
            $ambulans->save();

            return response()->json([
                'status' => 'success',
                'data' => new ResourcesAmbulans($ambulans)
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
            $ambulans = Ambulans::find($id);
            if(!$ambulans){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Ambulans Tidak Ditemukan'
                ], 404);
            }
            return response()->json([
                'status' => 'success',
                'data' => new ResourcesAmbulans($ambulans)
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
    public function edit(Ambulans $ambulans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'petugas_id' => 'required',
            'rumah_sakit_id' => 'required',
            'tipe' => 'required',
            'lokasi' => 'required',
            'plat_nomor' => 'required',
            'status' => 'required',
        ]);
        try{
            $ambulans = Ambulans::find($id);
            if(!$ambulans){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Ambulans Tidak Ditemukan'
                ], 404);
            }
            $ambulans->petugas_id = $request->petugas_id;
            $ambulans->rumah_sakit_id = $request->rumah_sakit_id;
            $ambulans->tipe = $request->tipe;
            $ambulans->lokasi = $request->lokasi;
            $ambulans->plat_nomor = $request->plat_nomor;
            $ambulans->status = $request->status;
            $ambulans->save();

            return response()->json([
                'status' => 'success',
                'data' => new ResourcesAmbulans($ambulans)
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
            $ambulans = Ambulans::find($id);
            if(!$ambulans){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Data Ambulans Tidak Ditemukan'
                ], 404);
            }
            $ambulans->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data Ambulans Berhasil Dihapus'
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

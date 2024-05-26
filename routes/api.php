<?php

use App\Http\Controllers\AmbulansController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\PertolonganPertamaController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('pertolongan-pertama', PertolonganPertamaController::class);
Route::apiresource('pasien', PasienController::class);
Route::apiResource('rumah-sakit', RumahSakitController::class);
Route::apiResource('ambulans', AmbulansController::class);
Route::apiResource('petugas', PetugasController::class);
Route::apiResource('dokumentasi', DokumentasiController::class);

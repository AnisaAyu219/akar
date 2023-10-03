<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ProfileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register_mhs', [MahasiswaController::class, 'register_mhs']);
Route::post('/login_mhs', [MahasiswaController::class, 'login_mhs']);
Route::post('/input_karya', [KaryaController::class, 'input_karya']);
Route::get('/getall_karya', [KaryaController::class, 'getall_karya']);
Route::get('/get_edit/{id_karya}', [KaryaController::class, 'get_edit']);
Route::post('/register_mahasiswa', [RegisterController::class, 'register_mahasiswa']);
Route::post('/register_dosen', [RegisterController::class, 'register_dosen']);
Route::post('/register_admin', [RegisterController::class, 'register_admin']);
Route::post('/login_mahasiswa', [LoginController::class, 'login_mahasiswa']);
Route::post('/login_dosen', [LoginController::class, 'login_dosen']);
Route::post('/login_admin', [LoginController::class, 'login_admin']);
Route::post('/login_user', [LoginUserController::class, 'login_user']);
Route::get('/getall_pelatihan', [PelatihanController::class, 'getall_pelatihan']);
Route::post('/input_pelatihan', [PelatihanController::class, 'input_pelatihan']);
Route::post('/input_komentar', [KomentarController::class, 'input_komentar']);
Route::get('/getall_komentar', [KomentarController::class, 'getall_komentar']);
Route::delete('/delete_komentar/{id_komentar}', [KomentarController::class, 'delete_komentar']);
Route::delete('/delete_karya/{id_karya}', [KaryaController::class, 'delete_karya']);
Route::delete('/delete_pelatihan/{id_pelatihan}', [PelatihanController::class, 'delete_pelatihan']);
Route::post('/input_biodata', [BiodataController::class, 'input_biodata']);
Route::get('/get_profile_mahasiswa/{nim}', [ProfileController::class, 'get_profile_mahasiswa']);
Route::get('/get_profile_admin/{id_admin}', [ProfileController::class, 'get_profile_admin']);
Route::get('/get_profile_dosen/{id_dosen}', [ProfileController::class, 'get_profile_dosen']);
Route::get('/komentar_karya/{id_karya}', [KomentarController::class, 'komentar_karya']);
Route::post('/update_karya/{id_karya}', [KaryaController::class, 'update_karya']);

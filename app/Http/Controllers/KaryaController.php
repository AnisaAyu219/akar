<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageStoreRequest;
use Illuminate\Support\Facades\Validator;

class KaryaController extends Controller
{
    public function input_karya (Request $request){
        $karya=new Karya();
        $karya->deskripsi=$request->deskripsi;
        $karya->dokumentasi = $request->file('dokumentasi')->store('public/dokumentasi');
        $karya->link_karya=$request->link_karya;
        $karya->nama=$request->nama;
        $karya->bidang=$request->bidang;
        $karya->nim=$request->nim;
        $karya->save();

        return response()->json($karya, 200);
    }

    public function getall_karya(){
        $karya = Karya::all();
        return response()->json($karya, 200);
    }

    public function delete_karya($id_karya){
        $karya= Karya::find($id_karya);
        $karya->delete();

        return response()->json([
            'message' => 'Successfully delete karya!'
        ], 200);
    }

    public function get_edit($id_karya){
        $karya= Karya::find($id_karya);
        return response()->json($karya, 200);
    }

    public function update_karya(Request $request, $id_karya)
{
    // Validasi data yang dibutuhkan
    $validator = Validator::make($request->all(), [
        'deskripsi' => 'required',
        'dokumentasi' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        'nim' => 'required',
        'nama' => 'required',
        'link_karya' => 'required',
        'bidang' => 'required',
    ]);

    if ($validator->fails()) {
        // Jika validasi gagal, kembalikan response dengan status 422 dan pesan error
        return response()->json([
            'status' => 'error',
            'message' => $validator->errors()
        ], 422);
    }

    // Update data karya di database
    $karya = Karya::findOrFail($id_karya);
    $karya->deskripsi = $request->input('deskripsi');
    $karya->nim = $request->input('nim');
    $karya->nama = $request->input('nama');
    $karya->link_karya = $request->input('link_karya');
    $karya->bidang = $request->input('bidang');
    $karya->dokumentasi = $request->file('dokumentasi')->store('public/dokumentasi');


    $karya->save();

    // Kembalikan response dengan status 200 dan pesan sukses
    return response()->json([
        'status' => 'success',
        'message' => 'Data karya berhasil diupdate'
    ], 200);
}

}

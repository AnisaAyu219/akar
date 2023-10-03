<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelatihan;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ImageStoreRequest;

class PelatihanController extends Controller
{
    public function input_pelatihan (Request $request){
        $pelatihan=new Pelatihan();
        $pelatihan->bidang=$request->deskripsi;
        $pelatihan->deskripsi=$request->deskripsi;
        $pelatihan->nama=$request->nama;
        $pelatihan->tahun_pelaksanaan=$request->tahun_pelaksanaan;
        $pelatihan->nim=$request->nim;
        $pelatihan->sertifikat=$request->file('sertifikat')->store('public/dokumentasi');
        $pelatihan->save();
        return response()->json($pelatihan, 200);
    }

    public function getall_pelatihan(){
        $pelatihan = Pelatihan::all();
        return response()->json($pelatihan, 200);
    }

    public function delete_pelatihan($id_pelatihan){
        $pelatihan= Pelatihan::find($id_pelatihan);
        $pelatihan->delete();

        return response()->json([
            'message' => 'Successfully delete pelatihan!'
        ], 200);
    }
}

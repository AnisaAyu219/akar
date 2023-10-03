<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function input_komentar (Request $request){
        $komentar=new Komentar();
        $komentar->id_karya=$request->id_karya;
        $komentar->isi=$request->isi;
        $komentar->save();

        return response()->json($komentar, 200);
    }

    public function getall_komentar(){
        $komentar = Komentar::all();
        return response()->json($komentar, 200);
    }

    public function delete_komentar($id_komentar){
        $komentar= Komentar::find($id_komentar);
        $komentar->delete();

        return response()->json([
            'message' => 'Successfully delete komentar!'
        ], 200);
    }


    public function komentar_karya(Request $request, $id_karya){
        $komentar = Komentar::where('id_karya', $id_karya)->get();
        return response()->json($komentar, 200);
    }
}



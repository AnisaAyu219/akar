<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;

class BiodataController extends Controller
{
    public function input_biodata (Request $request){
        $biodata=new Biodata();
        $biodata->nim=$request->nim;
        $biodata->pengalaman_kerja=$request->pengalaman_kerja;
        $biodata->foto_profile=$request->file('foto_profile')->store('public/foto_profile');
        $biodata->profile_singkat=$request->profile_singkat;
        $biodata->skill=$request->skill;
        $biodata->riwayat_pendidikan=$request->riwayat_pendidikan;


        $biodata->save();
        return response()->json($biodata, 200);
    }
}

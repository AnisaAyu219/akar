<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Admin;

class ProfileController extends Controller
{
    public function get_profile_mahasiswa(Request $request, $nim){
        $mahasiswa = Mahasiswa::with('biodata', 'karya', 'pelatihan', 'prestasi')
        ->where('nim', $nim)
        ->firstOrFail();

        return response()->json($mahasiswa, 200);
    }

    public function get_profile_admin(Request $request, $id_admin){
        $admin = Admin::where('id_admin', $id_admin)->get();
        return response()->json($admin, 200);
    }

    public function get_profile_dosen(Request $request, $id_dosen){
        $dosen = Dosen::where('id_dosen', $id_dosen)->get();
        return response()->json($dosen, 200);
    }
}


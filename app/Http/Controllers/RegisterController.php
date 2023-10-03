<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Admin;

class RegisterController extends Controller
{
    public function register_mahasiswa(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|max:25',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed',
            'no_telp' => 'required|string',
            'nama' => 'required|string',
            'alamat' => 'required|string'
        ]);

        $mahasiswa = new Mahasiswa([
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_telp' => $request->no_telp,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
        ]);
        $mahasiswa->save();
        return response()->json($mahasiswa, 201);
    }


    public function register_dosen(Request $request)
    {
        $validateData = $request->validate([
            'nip' => 'required|max:25',
            'password' => 'required|confirmed',
            'username' => 'required|string',
            'nama' => 'required|string',
        ]);

        $dosen = new Dosen([
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'nama' => $request->nama,
        ]);
        $dosen->save();
        return response()->json($dosen, 201);
    }


    public function register_admin(Request $request)
    {
        $validateData = $request->validate([
            'id_admin' => 'required|max:25',
            'password' => 'required|confirmed',
            'nama' => 'required|string',
        ]);

        $admin = new Admin([
            'id_admin' => $request->id_admin,
            'password' => bcrypt($request->password),
            'nama' => $request->nama,
        ]);
        $admin->save();
        return response()->json($admin, 201);
    }


}

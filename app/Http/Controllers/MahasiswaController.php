<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function register_mhs(Request $request)
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



    public function login_mhs(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        $login_detail = request(['nim', 'password']);

        if (!Auth:: attempt($login_detail)) {
            return response()->json(['error' => 'vincen guantengggg'],401);
        }
            $mahasiswa = $request->user();

            $tokenResult = $mahasiswa->createToken('AccessToken');
            $token = $tokenResult->token;
            $token->save();

            return response()->json([
                'access_token' => 'Bearer'. $tokenResult->accessToken,
                'token_id' => $token->id,
                'nama' => $mahasiswa->nama,
                'nim' => $mahasiswa->nim
            ], 200);
        }
}

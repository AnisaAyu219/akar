<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Admin;

class LoginController extends Controller
{
    public function login_mahasiswa(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('mahasiswa')->attempt($validateData)) {
            return response()->json(['error' => 'Login gagal. Cek kembali NIM dan password.'], 401);
        }

        $mahasiswa = $request->user('mahasiswa');

        $tokenResult = $mahasiswa->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => 'Bearer ' . $tokenResult->accessToken,
            'token_id' => $token->id,
            'nama' => $mahasiswa->nama,
            'nim' => $mahasiswa->nim
        ], 200);
    }

    public function login_dosen(Request $request)
    {
        $validateData = $request->validate([
            'nip' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('dosen')->attempt($validateData)) {
            return response()->json(['error' => 'Login gagal. Cek kembali NIP dan password.'], 401);
        }

        $dosen = $request->user('dosen');

        $tokenResult = $dosen->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => 'Bearer ' . $tokenResult->accessToken,
            'token_id' => $token->id,
            'nama' => $dosen->nama,
            'nip' => $dosen->nip
        ], 200);
    }

    public function login_admin(Request $request)
    {
        $validateData = $request->validate([
            'id_admin' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('admin')->attempt($validateData)) {
            return response()->json(['error' => 'Login gagal. Cek kembali ID Admin dan password.'], 401);
        }

        $admin = $request->user('admin');

        $tokenResult = $admin->createToken('AccessToken');
        $token = $tokenResult->token;
        $token->save();

        return response()->json([
            'access_token' => 'Bearer ' . $tokenResult->accessToken,
            'token_id' => $token->id,
            'nama' => $admin->nama,
            'id_admin' => $admin->id_admin
        ], 200);
    }
}

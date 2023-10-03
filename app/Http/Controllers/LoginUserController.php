<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginUserController extends Controller
{
    public function login_user(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $user_type = $request->input('user_type'); // Contoh: 'mahasiswa', 'dosen', atau 'admin'

        $credentials = [
            'password' => $password,
        ];

        switch ($user_type) {
            case 'mahasiswa':
                $credentials['nim'] = $username;
                if (Auth::guard('mahasiswa')->attempt($credentials)) {
                    $user = Auth::guard('mahasiswa')->user('mahasiswa');
                    return response()->json(['user' => $user, 'user_type' => 'mahasiswa'],200);
                }
                break;

            case 'dosen':
                $credentials['username'] = $username;
                if (Auth::guard('dosen')->attempt($credentials)) {
                    $user = Auth::guard('dosen')->user('dosen');
                    return response()->json(['user' => $user, 'user_type' => 'dosen'],200);
                }
                break;

            case 'admin':
                $credentials['id_admin'] = $username;
                if (Auth::guard('admin')->attempt($credentials)) {
                    $user = Auth::guard('admin')->user('admin');
                    return response()->json(['user' => $user, 'user_type' => 'admin'],200);
                }
                break;

            default:
                // Jenis pengguna tidak valid
                return response()->json(['error' => 'Jenis pengguna tidak valid'], 401);
        }

        // Jika tidak ada jenis pengguna yang cocok atau otentikasi gagal
        return response()->json(['error' => 'Gagal masuk'], 401);
    }
}






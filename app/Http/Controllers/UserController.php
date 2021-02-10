<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function formMasuk()
    {
        return view('masuk');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->id_level == 3) {
                return redirect()->route('beranda');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->back();
        }
    }

    public function formDaftar()
    {
        return view('daftar');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        $user = User::create([
            'nama_petugas' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if ($user) {
            return redirect()->route('masuk');
        } else {
            return redirect()->back();
        }
    }

    public function keluar()
    {
        Auth::logout();

        return redirect()->route('masuk');
    }

    public function beranda()
    {
        return view('user.beranda');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}

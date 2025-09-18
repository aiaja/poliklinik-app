<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function ShowLogin()
    {
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role == 'dokter') {
                return redirect()->route('dokter.dashboard');
            } else {
                return redirect()->route('pasien.dashboard');
            }
        }
        return redirect()->back()->withErrors(['email' => 'Email atau password salah']);
    }


    public function ShowRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => ['required' ,'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required' , 'confirmed'],
            'alamat' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:15'],
            'no_ktp' => ['required', 'string', 'max:225'],
        ]);

        if(User::where('no_ktp', $request->no_ktp)->exists()){
            return redirect()->back()->withErrors(['no_ktp' => 'No KTP sudah terdaftar']);
        }

        $no_rm = date('Ym') . '-' .str_pad(
            User::where('no_rm', 'like', date('Ym') . '-%')->count() + 1,
            3,
            '0',
            STR_PAD_LEFT
        );

        // Buat user baru
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'no_ktp' => $request->no_ktp,
            'no_rm' => $no_rm,
            'role' => 'pasien',
        ]);
        return redirect()->route('login');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class MahasiswaAuthController extends Controller
{
    // Tampilkan form login mahasiswa
    public function showLogin()
    {
        return view('auth.mahasiswa-login');
    }

    // Proses login mahasiswa (cookie-based)
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', 'mahasiswa')
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.'])->withInput();
        }

        // Simpan data user di cookie (berlaku 7 hari)
        $cookie = Cookie::make('mahasiswa_logged_in', json_encode([
            'id'   => $user->id,
            'name' => $user->name,
            'email'=> $user->email,
            'nim'  => $user->nim,
        ]), 60 * 24 * 7); // menit

        return redirect()->route('mahasiswa.dashboard')->withCookie($cookie);
    }

    // Tampilkan form register mahasiswa
    public function showRegister()
    {
        return view('auth.mahasiswa-register');
    }

    // Proses register mahasiswa
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'nim'      => 'required|string|max:20|unique:users,nim',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'nim'      => $request->nim,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'mahasiswa',
        ]);

        return redirect()->route('mahasiswa.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Logout mahasiswa (hapus cookie)
    public function logout()
    {
        $cookie = Cookie::forget('mahasiswa_logged_in');
        return redirect()->route('home')->withCookie($cookie);
    }

    // Dashboard mahasiswa (contoh)
    public function dashboard(Request $request)
    {
        $mahasiswa = json_decode($request->cookie('mahasiswa_logged_in'));

        if (!$mahasiswa) {
            return redirect()->route('mahasiswa.login')->withErrors(['msg' => 'Silakan login terlebih dahulu.']);
        }

        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }
}

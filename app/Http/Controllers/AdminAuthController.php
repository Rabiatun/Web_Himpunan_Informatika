<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    // Validasi secret key dari URL, return 404 jika salah
    private function validateSecret(string $secret): void
    {
        if ($secret !== config('app.admin_secret_key')) {
            abort(404);
        }
    }

    // Tampilkan form login admin (hanya jika secret key benar)
    public function showLogin(string $secret)
    {
        $this->validateSecret($secret);
        return view('auth.admin-login', compact('secret'));
    }

    // Proses login admin (session-based)
    public function login(Request $request, string $secret)
    {
        $this->validateSecret($secret);

        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $admin = User::where('email', $request->email)
                     ->where('role', 'admin')
                     ->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['email' => 'Email atau password admin salah.'])->withInput();
        }

        // Simpan ke session
        $request->session()->put('admin', [
            'id'    => $admin->id,
            'name'  => $admin->name,
            'email' => $admin->email,
        ]);

        return redirect()->route('admin.dashboard');
    }

    // Logout admin (hapus session)
    public function logout(Request $request)
    {
        $request->session()->forget('admin');
        // Redirect ke home, bukan ke login admin (URL rahasia)
        return redirect()->route('home');
    }

    // Dashboard admin
    public function dashboard(Request $request)
    {
        $admin = $request->session()->get('admin');

        if (!$admin) {
            abort(404); // Jangan bocorkan URL login admin
        }

        return view('admin.dashboard', compact('admin'));
    }

    // Tampilkan form ganti password admin
    public function showForgotPassword(string $secret)
    {
        $this->validateSecret($secret);
        return view('auth.admin-forgot-password', compact('secret'));
    }

    // Proses ganti password admin
    public function updatePassword(Request $request, string $secret)
    {
        $this->validateSecret($secret);

        $request->validate([
            'email'                 => 'required|email',
            'new_password'          => 'required|min:8|confirmed',
        ]);

        $admin = User::where('email', $request->email)
                     ->where('role', 'admin')
                     ->first();

        if (!$admin) {
            return back()->withErrors(['email' => 'Email admin tidak ditemukan.'])->withInput();
        }

        $admin->update(['password' => Hash::make($request->new_password)]);

        return redirect()->route('admin.login', ['secret' => $secret])
                         ->with('success', 'Password berhasil diubah. Silakan login.');
    }
}

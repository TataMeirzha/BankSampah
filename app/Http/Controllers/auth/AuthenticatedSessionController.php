<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withErrors(['email' => 'Email atau kata sandi yang kamu masukkan tidak cocok.'])
                ->onlyInput('email');
        }

        $user = Auth::user();

        // Akun bank sampah / DLH yang belum diverifikasi admin tidak boleh masuk dulu
        if (! $user->is_verified) {
            Auth::logout();

            return back()
                ->withErrors(['email' => 'Akun kamu masih menunggu verifikasi admin sebelum bisa digunakan.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended('/')->with('status', 'Berhasil masuk. Selamat datang kembali, '.$user->name.'!');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Kamu berhasil keluar.');
    }
}

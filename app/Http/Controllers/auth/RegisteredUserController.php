<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'in:penyetor,bank_sampah,dlh'],
            'alamat_lengkap' => ['required', 'string'],
            'kelurahan' => ['nullable', 'string', 'max:100'],
            'kecamatan' => ['nullable', 'string', 'max:100'],
            'kota' => ['required', 'string', 'max:100'],
            'provinsi' => ['nullable', 'string', 'max:100'],
            'kode_pos' => ['nullable', 'string', 'max:10'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
            // Penyetor langsung aktif, bank sampah & DLH menunggu verifikasi admin dulu
            'is_verified' => $validated['role'] === User::ROLE_PENYETOR,
        ]);

        $user->alamat()->create([
            'alamat_lengkap' => $validated['alamat_lengkap'],
            'kelurahan' => $validated['kelurahan'] ?? null,
            'kecamatan' => $validated['kecamatan'] ?? null,
            'kota' => $validated['kota'],
            'provinsi' => $validated['provinsi'] ?? null,
            'kode_pos' => $validated['kode_pos'] ?? null,
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
        ]);

        if ($user->role === User::ROLE_PENYETOR) {
            Auth::login($user);

            return redirect('/')->with('status', 'Registrasi berhasil. Selamat datang, '.$user->name.'!');
        }

        return redirect()->route('login')->with(
            'status',
            'Registrasi berhasil. Akun '.$user->name.' akan aktif setelah diverifikasi oleh admin, silakan masuk setelah itu.'
        );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

        return match ($user->role) {
            User::ROLE_PENYETOR => view('dashboard.penyetor', [
                'setorans' => $user->setoranSampahs()
                    ->with(['bankSampah', 'detailPilahans.kategoriSampah'])
                    ->latest()
                    ->get(),
                'totalPoin' => $user->totalPoin(),
            ]),

            User::ROLE_BANK_SAMPAH => view('dashboard.bank-sampah', [
                'setorans' => $user->setoranDitangani()
                    ->with(['penyetor', 'detailPilahans'])
                    ->latest()
                    ->get(),
            ]),

            User::ROLE_DLH => view('dashboard.dlh', [
                'distribusis' => $user->distribusiDitangani()
                    ->with(['detailPilahan.setoranSampah.penyetor', 'detailPilahan.kategoriSampah'])
                    ->latest()
                    ->get(),
            ]),

            default => view('dashboard.admin'),
        };
    }
}
